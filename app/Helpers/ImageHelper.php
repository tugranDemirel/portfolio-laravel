<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class ImageHelper
{
    public static function uploadImage($image, $path)
    {
        if(!file_exists($path))
            mkdir($path, 0777, true);
        $imageName = Str::slug(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME)) . '-' . time() . '.' . $image->getClientOriginalExtension();
        $image->move($path, $imageName);
        return $path.'/'.$imageName;
    }

    public static function deleteImage($image)
    {
        if ($image != null)
        {
            if (file_exists(public_path( $image))) {
                unlink(public_path($image));
                return true;
            }
        }
    }

    public static function uploadMultipleImage($images, $path)
    {
        $imageNames = [];
        foreach($images as $image)
        {
            $imageName = self::uploadImage($image, $path);
            $imageNames[] = $imageName;
        }
        return $imageNames;
    }

    public static function deleteMultipleImage($images)
    {
        foreach($images as $image)
        {
            self::deleteImage($image);
        }
    }

    public static function updateImage($image, $path, $oldImage)
    {
        self::deleteImage($oldImage);
        return self::uploadImage($image, $path);
    }

    public static function updateMultipleImage($images, $path, $oldImages)
    {
        self::deleteMultipleImage($oldImages, $path);
        return self::uploadMultipleImage($images, $path);
    }
}
