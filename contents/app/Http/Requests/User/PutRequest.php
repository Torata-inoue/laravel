<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class PutRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'string',
            'email' => 'string',
            'comment' => 'string',
            'stamina' => 'int',
        ];
    }
}
