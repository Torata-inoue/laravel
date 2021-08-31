<?php

namespace App\Http\Controllers\API\Redux\Comment;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\Comment\GetService;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function getComments(GetService $service, $page): JsonResponse
    {
        return new JsonResponse($service->getComments($page));
    }

    public function findComment()
    {

    }
}
