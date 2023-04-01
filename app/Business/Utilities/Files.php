<?php

namespace App\Business\Utilities;

use Illuminate\Support\Facades\Storage;

class Files
{
    public static function removeImages($images, $disk = null)
    {
        $disk = config('filesystems.default', $disk);
        $images = Arrays::whereNotEmpty($images);
        if (sizeof($images) == 0) {
            return;
        }

        foreach ($images as $image) {
            if (Storage::disk($disk)->exists($image)) {
                Storage::disk($disk)->delete($image);
            }
        }
    }
}
