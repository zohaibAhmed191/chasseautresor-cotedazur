<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Partner extends Model
{
    protected $fillable = ['title', 'description', 'url', 'image'];

    // Custom method to rename and move the uploaded image
    public function renameAndStoreImage($originalPath)
    {
        if ($originalPath && Storage::disk('public')->exists($originalPath)) {
            // Sanitize the title for the filename
            $sanitizedTitle = Str::slug($this->title ?? 'partner'); // Fallback if title is empty
            $extension = pathinfo($originalPath, PATHINFO_EXTENSION); // Get the extension from the original path
            $newFileName = "{$sanitizedTitle}.{$extension}"; // e.g., "abc-123.jpg"

            // Move the file to the new name within the partners directory
            $newPath = "partners/{$newFileName}";
            Storage::disk('public')->move($originalPath, $newPath);

            return $newPath;
        }

        return $originalPath; // Return original path if no rename is needed
    }

    // Override the setImageAttribute to handle renaming after Filament upload
    public function setImageAttribute($value)
    {
        if ($value && is_string($value)) {
            // Filament passes the stored path as a string (e.g., "partners/randomstring.jpg")
            $this->attributes['image'] = $this->renameAndStoreImage($value);
        } else {
            $this->attributes['image'] = $value; // Handle null or other cases
        }
    }
}