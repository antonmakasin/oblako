<?php

namespace App\Services\API\V1\File;

use App\Helpers\Uploader;
use App\Models\File;

/**
 * Class DestroyService
 *
 * @package App\Services\API\V1\File
 */
class DestroyService
{
    /**
     * @param int $file_id
     *
     * @return void
     */
    public static function destroy(int $file_id) : void
    {
        $file = File::findOrFail($file_id);
        Uploader::deleteFile($file);
        $file->delete();
    }
}
