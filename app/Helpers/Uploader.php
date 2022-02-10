<?php

namespace App\Helpers;

use Carbon\Carbon;
use Image;
use Storage;
use File;

class Uploader
{
    public static function fileUpload($file)
    {
        $is_image = @is_array(getimagesize($file));
        $extension = self::getFileExtension($file, $is_image);
        $dir = self::generateDir(config('file.base_public_path'));
        $file_name = self::getFileNameBase($file, $extension);
        $path = $dir . $file_name;
        File::makeDirectory(storage_path('app/public' . $dir), 0755, true, true);

        if ($is_image && config('file.image_process'))
        {
            $image = Image::make($file->getRealPath());

            if (config('file.image_resize_width') && config('file.image_resize_height'))
            {
                $image->resize(config('file.image_resize_width'), config('file.image_resize_height'), function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                });
            }

            if (config('file.image_format'))
            {
                $image->encode(config('file.image_format'));
            }

            $quality = config('file.image_quality') ?: 90;

            $image->save(storage_path('app/public' . $path), $quality);
        }
        else
        {
            $file->storeAs($dir, $file_name, 'public');
        }

        return [
            'path' => $path,
            'extension' => $extension,
            'size' => Storage::disk('public')->size($path),
        ];
    }

    public static function getFileNameBase($file, $extension = '')
    {
        $file_name = time() . '-' . mt_rand();

        return $extension
            ? $file_name . '.' . $extension
            : $file_name;
    }

    public static function getFileExtension($file, $is_image)
    {
        return $is_image && config('file.image_format')
            ? config('file.image_format')
            : $file->getClientOriginalExtension();
    }

    public static function getFileType($file)
    {
        return @is_array(getimagesize($file)) ? 'image' : $file->extension();
    }

    public static function generateDir($folder)
    {
        return '/' . $folder . '/1/' . Carbon::now()->format('Y/m/d') . '/';
    }

    public static function deleteFile(object $file)
    {
        if (Storage::disk('public')->exists($file->path))
        {
            Storage::disk('public')->delete($file->path);
        }
    }
}
