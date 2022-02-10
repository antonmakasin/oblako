<?php

namespace App\Helpers;

class Strings
{
    public static function getFilterStringFromRequest()
    {
        $filter_string = '';
        foreach (request()->all() as $field => $value)
        {
            if (strpos($field, 'sort_') === false)
            {
                $filter_string .= $field .  '=' . $value . '&';
            }
        }

        return $filter_string ? mb_substr($filter_string, 0, -1) : '';
    }

    public static function filePath($file_path)
    {
        return config('app.url') . '/storage' . $file_path;
    }
}
