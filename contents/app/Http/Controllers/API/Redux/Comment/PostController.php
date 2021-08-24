<?php

namespace App\Http\Controllers\API\Redux\Comment;

use App\Http\Requests\Comment\PostRequest;
use App\Services\API\Redux\Comment\PostService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController
{
    /**
     * @param PostRequest $request
     * @param PostService $service
     * @return JsonResponse
     */
    public function postComment(Request $request, PostService $service): JsonResponse
    {
        $text = $request->input('comment');
        $nominees = $request->input('nominees');
        $service->postComment($text, $nominees);

        return new JsonResponse();
    }
}
