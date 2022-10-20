<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

if (!function_exists('verifiedFiledExt')) {
    function verifiedFileExt(Request $request): bool
    {
        $allowedExt = ['jpeg', 'jpg', 'png'];
        // Verified submit file extension
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $ext = $file->getClientOriginalExtension();
                if (!in_array($ext, $allowedExt)) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}

if (!function_exists('saveFile')) {
    function saveFile(Request $request): array
    {

        if ($request->hasFile('images')) {
            $fileNames = [];
            foreach ($request->file('images') as $file) {
                $name = $file->store('project-images');

                array_push($fileNames, $name);
            }

            return $fileNames;
        }

        return null;
    }
}

if (!function_exists('deleteImage')) {

    function deleteImages($images)
    {
        $imagesArray = json_decode($images);
        array_map(function ($url) {
            if (File::exists(public_path($url))) {
                File::delete(public_path($url));
            }
        }, $imagesArray);
    }
}
