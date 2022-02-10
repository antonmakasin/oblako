<?php

namespace App\Http\Requests\API\V1\File;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'file' => [
                'bail',
                'required',
                'file',
            ],
        ];

        if (config('file.max_size'))
        {
            $rules['file'][] = 'max:' . config('file.max_size');
        }

        if (config('file.mimes'))
        {
            $rules['file'][] = 'mimes:' . config('file.mimes');
        }

        return $rules;
    }

    public function attributes()
    {
        return [

        ];
    }

    public function messages()
    {
        $max_size = config('file.max_size') ? round(config('file.max_size') / 1024) : 0;

        return [
            'file.max' => __('messages.file_max_size_mb', ['size' => $max_size]),
        ];
    }
}
