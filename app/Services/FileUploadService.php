<?php


namespace App\Services;


use Carbon\Carbon;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class FileUploadService
{
    public function uploadFile($file, $type, $model_name = null, $model = null)
    {
        $this->removeFileIfExists($model, $type);
        if (!is_file($file)) {
            return $file;
        }
        $now = Carbon::now();
        $path = "uploads/" . ($model_name ?: "user") . "/" . $now->year . "/" . $now->month . "/";

        return Storage::disk('public')->put($path, $file, 'public');
    }

    private function removeFileIfExists($model, $type)
    {
        if ($model) {
            $file_path = $model->getAttributes()[$type];
            if (Storage::disk('public')->exists($file_path) && $model->$type != null) {
                Storage::disk('public')->delete($file_path);
            }
        }
    }
}
