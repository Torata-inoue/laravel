<?php

namespace App\Http\Controllers\API\Redux\Comment;

use App\Http\Requests\Comment\PostRequest;
use App\Services\API\Redux\Comment\PostService;
use Illuminate\Http\JsonResponse;

class PostController
{
    /**
     * @param PostRequest $request
     * @param PostService $service
     * @return JsonResponse
     */
    public function postComment(PostRequest $request, PostService $service): JsonResponse
    {
        list($user_id, $text, $nominees) = $request->only(['user_id', 'text', 'nominees']);
        $service->postComment($user_id, $text, $nominees);

        return new JsonResponse();
    }
}
