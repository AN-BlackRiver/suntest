<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class ImageUploadService
{
    public static function upload(UploadedFile $file, Model $model)
    {
        $fileName =

        $model->image()->create(['path' => $file]);
    }
}
