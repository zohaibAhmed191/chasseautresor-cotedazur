<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'description', 'slug','meta_title_seo','meta_description_seo','meta_keywords_seo','image_alt_text','image_title_attr'];

    protected $appends = ['image_url']; // Append the image_url attribute

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($blog) {
            // Generate or update slug based on title
            if (empty($blog->slug) || $blog->isDirty('title')) {
                $slugBase = Str::slug($blog->title, '-');
                $originalSlug = $slugBase;
                $count = 1;

                // Ensure slug uniqueness
                while (static::where('slug', $slugBase)->where('id', '!=', $blog->id ?? 0)->exists()) {
                    $slugBase = "{$originalSlug}-{$count}";
                    $count++;
                }
                $blog->slug = $slugBase;
            }

            // Handle image renaming and storage
            if ($blog->isDirty('image') && $blog->image) {
                if ($blog->image instanceof \Illuminate\Http\UploadedFile) {
                    // New file upload
                    $sanitizedTitle = Str::slug($blog->title ?? 'blog');
                    $extension = $blog->image->getClientOriginalExtension();
                    $imageName = $sanitizedTitle . '.' . $extension;
                    $counter = 1;

                    // Ensure uniqueness by checking existing filenames
                    while (Storage::disk('public')->exists("blogs/{$imageName}")) {
                        $imageName = $sanitizedTitle . '-' . $counter . '.' . $extension;
                        $counter++;
                    }

                    // Store the new image in the public disk under the blogs directory
                    $path = $blog->image->storeAs('blogs', $imageName, 'public');
                    $blog->image = $path; // Store the relative path (e.g., "blogs/my-blog-post.jpg")
                } elseif (is_string($blog->image) && Storage::disk('public')->exists($blog->image)) {
                    // Existing image path (e.g., from update), rename if needed
                    $sanitizedTitle = Str::slug($blog->title ?? 'blog');
                    $extension = pathinfo($blog->image, PATHINFO_EXTENSION);
                    $newImageName = $sanitizedTitle . '.' . $extension;
                    $counter = 1;

                    while (Storage::disk('public')->exists("blogs/{$newImageName}") && $blog->image !== "blogs/{$newImageName}") {
                        $newImageName = $sanitizedTitle . '-' . $counter . '.' . $extension;
                        $counter++;
                    }

                    if ($blog->image !== "blogs/{$newImageName}") {
                        $newPath = "blogs/{$newImageName}";
                        Storage::disk('public')->move($blog->image, $newPath);
                        $blog->image = $newPath;
                    }
                }
            }
        });

        // Handle image deletion when the blog is deleted
        static::deleting(function ($blog) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
        });
    }

    // Accessor for image URL
    public function getImageUrlAttribute()
    {
        if ($this->image && Storage::disk('public')->exists($this->image)) {
            return asset('storage/' . $this->image); // e.g., http://yourdomain.com/storage/blogs/my-blog-post.jpg
        }
        return null; // Return null if no image or image doesn't exist
    }

    public static function getDetailsBySlug($slug)
    {
        return self::where('slug', $slug)->firstOrFail();
    }
}