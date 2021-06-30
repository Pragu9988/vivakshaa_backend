<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PPService
{
    public function uploadImage($image, $type, $model_name = null, $model = null)
    {
        if (!is_file($image)) {
            return $image;
        }
        return $this->uploadByType($image, $type, $model_name, $model);
    }

    private function uploadByType($image, $type, $model_name, $model)
    {
        $this->removeImageIfExists($model, $type);

        $now = Carbon::now();
        $hash = Str::random(40);
        $image = Image::make($image);

        if ($type == "private_profile_pic") {
            $image
                ->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->blur(2)
                ->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->blur(50)
                ->resize(40, 40, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->blur(1)
                ->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->blur(50)
                ->encode('jpg');
            $path = "uploads/private_profile/" . $now->year . "/" . $now->month . "/" . $hash . ".jpg";
        } else {
            $image->encode('jpg', 20);
            $path = "uploads/" . ($model_name ?: "user") . "/" . $now->year . "/" . $now->month . "/" . $hash . ".jpg";
        }
        if (Storage::disk('public')->put($path, $image->__toString(), 'public')) {
            return $path;
        }
    }

    private function removeImageIfExists($model, $type)
    {
        if ($model) {
            $file_path = $model->getAttributes()[$type];
            if (Storage::disk('public')->exists($file_path) && $model->$type != null) {
                Storage::disk('public')->delete($file_path);
            }
        }
    }

    public function uploadImageUrl($url, $type, $model_name = null, $model = null)
    {
        if ($url) {
            $contents = file_get_contents($url);
            return $this->uploadByType($contents, $type, $model_name, $model);
        }
        return null;
    }
}
