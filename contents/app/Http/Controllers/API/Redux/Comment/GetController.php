<?php

namespace App\Http\Controllers\API\Redux\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getComments(): JsonResponse
    {
        return new JsonResponse(['getOk']);
    }

    public function findComment()
    {

    }
}
