<?php

return [
    'max_size' => env('FILE_MAX_SIZE', 20000),
    'mimes' => env('FILE_MIMES', 'doc,xls,xlsx,docx,pdf,rtf,txt,ppt,pptx,png,jpeg,jpg,jpe,svg,rar,zip,webp,sql'),
    'base_public_path' => env('FILE_BASE_PUBLIC_PATH', 'files'),

    'image_process' => env('FILE_IMAGE_PROCESS', 1),
    'image_resize_width' => env('FILE_IMAGE_RESIZE_WIDTH', 2000),
    'image_resize_height' => env('FILE_IMAGE_RESIZE_HEIGHT', 2000),
    'image_quality' => env('FILE_IMAGE_QUALITY', 90),
    'image_format' => env('FILE_IMAGE_FORMAT', 'jpg'), // jpg, png, webp
];
