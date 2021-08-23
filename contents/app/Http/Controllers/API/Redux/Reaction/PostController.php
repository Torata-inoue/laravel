<?php

namespace App\Http\Controllers\API\Redux\Reaction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reaction\PostRequest;
use App\Services\API\Redux\Reaction\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * @param PostRequest $request
     * @param PostService $service
     * @return JsonResponse
     */
    public function postReaction(PostRequest $request, PostService $service)
    {
        list($comment_id, $target_id) = $request->only(['comment_id', 'target_id']);
        $service->postReaction($comment_id, $target_id);

        return new JsonResponse();
    }
}