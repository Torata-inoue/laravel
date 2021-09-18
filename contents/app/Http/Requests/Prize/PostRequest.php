<?php

namespace App\Http\Requests\Prize;

use App\Http\Requests\BaseRequest;

class PostRequest extends BaseRequest
{
    public function rules()
    {
        return [
            'prize_id' => 'required|int'
        ];
    }
}
