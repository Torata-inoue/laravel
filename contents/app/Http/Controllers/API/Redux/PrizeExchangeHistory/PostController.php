<?php

namespace App\Http\Controllers\API\Redux\PrizeExchangeHistory;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrizeExchangeHistory\PostRequest;
use App\Services\API\Redux\PrizeExchangeHistory\PostService;
use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    public function postPrizeExchangeHistory(PostRequest $request, PostService $service)
    {
        $prize_id = $request->input('prize_id');
        $service->post($prize_id);
        return new JsonResponse();
    }
}
