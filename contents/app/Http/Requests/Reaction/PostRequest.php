<?php

namespace App\Http\Requests\Reaction;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'comment_id' => 'required|int',
            'target_id' => 'required|int'
        ];
    }
}
