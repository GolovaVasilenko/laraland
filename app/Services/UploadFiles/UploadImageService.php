<?php

namespace App\Services\UploadFiles;

use Illuminate\Http\Request;

class UploadImageService
{
    public static function uploadImages(Request $request, $model, $dir = '/')
    {
        if($request->has('images')){
            $files = $request->file('images');
            foreach($files['gallery'] as $image) {
                $path = $image->storeAs($dir, $image->getClientOriginalName(), 'media');
                $model->addMedia(public_path('media' . $dir . $path))
                    ->toMediaCollection('media');
            }
        }
    }
}
