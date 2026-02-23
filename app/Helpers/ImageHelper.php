<?php

namespace App\Helpers;

/**
 * Get the correct image path for both old (public/images) and new (storage) uploads
 * 
 * @param string $imagePath
 * @return string
 */
function getImagePath($imagePath)
{
    if (!$imagePath) {
        return '';
    }
    
    // Jika file exists di public folder, gunakan asset() biasa
    if (file_exists(public_path($imagePath))) {
        return asset($imagePath);
    }
    
    // Jika tidak, anggap di storage/app/public
    return asset('storage/' . $imagePath);
}
