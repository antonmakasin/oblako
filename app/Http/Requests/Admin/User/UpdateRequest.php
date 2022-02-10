<?php

namespace App\Http\Requests\Admin\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password' => [
                'bail',
                'nullable',
                'string',
                'min:' . User::MIN_PASSWORD_LENGTH,
            ],
        ];
    }

    public function attributes()
    {
        return [

        ];
    }

    public function messages()
    {
        return [

        ];
    }
}
