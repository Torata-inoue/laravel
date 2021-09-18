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
        $text = $request->input('comment');
        $nominees = $request->input('nominees');
        $comment = $service->postComment($text, $nominees);

        return new JsonResponse($comment);
    }
}
