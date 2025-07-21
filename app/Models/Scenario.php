<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Scenario extends Model
{
    protected $fillable = ['title', 'slug', 'image', 'description', 'players', 'age', 'location', 'duration', 'heading', 'paragraph', 'video_url','meta_title_seo','meta_description_seo','meta_keywords_seo','image_alt_text','image_title_attr'];
    protected static function boot()
    {
        parent::boot();

        // Automatically generate slug when creating a scenario
        static::creating(function ($scenario) {
            $scenario->slug = $scenario->generateUniqueSlug($scenario->title);
        });

        // Update slug when title is updated
        static::updating(function ($scenario) {
            if ($scenario->isDirty('title')) {
                $scenario->slug = $scenario->generateUniqueSlug($scenario->title);
            }
        });
    }

    // Generate a unique slug based on the title
    public function generateUniqueSlug($title)
    {
        $slug = Str::slug($title); // e.g., "Adventure Game" -> "adventure-game"
        $originalSlug = $slug;
        $count = 1;

        // Check if the slug already exists, excluding the current scenario
        while (static::where('slug', $slug)->where('id', '!=', $this->id ?? 0)->exists()) {
            $slug = "{$originalSlug}-{$count}"; // e.g., "adventure-game-1"
            $count++;
        }

        return $slug;
    }

    // Custom method to rename and store the uploaded image
    public function renameAndStoreImage($originalPath)
    {
        if ($originalPath && Storage::disk('public')->exists($originalPath)) {
            $sanitizedTitle = Str::slug($this->title ?? 'scenario');
            $extension = pathinfo($originalPath, PATHINFO_EXTENSION);
            $newFileName = "{$sanitizedTitle}.{$extension}";
            $newPath = "scenarios/{$newFileName}";
            Storage::disk('public')->move($originalPath, $newPath);
            return $newPath;
        }
        return $originalPath;
    }

    // Override setImageAttribute for image renaming
    public function setImageAttribute($value)
    {
        if ($value && is_string($value)) {
            $this->attributes['image'] = $this->renameAndStoreImage($value);
        } else {
            $this->attributes['image'] = $value;
        }
    }

    // Static method to get scenario details by slug
    public static function getDetailsBySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }
}
