<?php

namespace App\Business\Models;

use App\Business\Utilities\Arrays;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class Medias
{
    public static function addMedia(Model $model, $files, ?string $name = null, string $collection = 'default')
    {
        if (!method_exists($model, 'addMedia')) {
            return;
        }

        $files = Arrays::whereNotEmpty($files);
        foreach ($files as $file) {
            try {
                $name = $name ?: Str::random(10);
                $file_name = $name . "." . $file->getClientOriginalExtension();
                $model->addMedia($file)
                    ->setFileName($file_name)
                    ->setName($name)
                    ->toMediaCollection($collection ?: 'default');
            } catch (Exception $exception) {
                Log::error($exception->getMessage());
                Log::error($exception->getTraceAsString());
                continue;
            }
        }
    }
}
