<?php

namespace App\Services\API\V1\File;

use App\Helpers\Strings;
use App\Helpers\Uploader;
use App\Http\Requests\API\V1\File\StoreRequest;
use App\Models\File;

/**
 * Class StoreService
 *
 * @package App\Services\API\V1\File
 */
class StoreService
{
    /**
     * @param StoreRequest $request
     *
     * @return string
     */
    public static function store(StoreRequest $request) : string
    {
        $file_created = Uploader::fileUpload($request->file);

        $file = File::create([
            'user_id'       => 1,
            'path'          => $file_created['path'],
            'extension'     => $file_created['extension'],
            'size'          => $file_created['size'],
        ]);

        return Strings::filePath($file->path);
    }
}
