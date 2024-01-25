<?php

namespace App\Traits;

use File;

trait ImageUploadTrait
{
    public function uploadImage($request, $inputName, $path, $oldPath = null)
    {
        if ($request->hasFile($inputName)) {
            if ($oldPath !== null && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }
            $image = $request->{$inputName};
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_' . uniqid() . '.' . $ext;
            $image->move(public_path($path), $imageName);
            return $path . '/' . $imageName;
        }
        if ($oldPath !== null) {
            return $oldPath;
        }
        return null;
    }

    public function uploadMultiImage($request, $inputName, $path)
    {
        $paths = [];
        if ($request->hasFile($inputName)) {
            $images = $request->{$inputName};
            foreach ($images as $image) {

                $ext = $image->getClientOriginalExtension();
                $imageName = 'media_' . uniqid() . '.' . $ext;
                $image->move(public_path($path), $imageName);
                $paths[] = $path . '/' . $imageName;
            }
        }
        return $paths;

    }

    public function deleteImage(string $path)
    {
        if ($path !== null && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}