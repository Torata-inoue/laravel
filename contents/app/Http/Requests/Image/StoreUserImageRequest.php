<?php

namespace App\Http\Requests\Image;

use App\Http\Requests\BaseRequest;

class StoreUserImageRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'file' => 'required'
        ];
    }
}
