<?php

namespace App\Http\Controllers\API\Redux\PrizeExchangeHistory;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\PrizeExchangeHistory\GetService;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    public function getPrizeExchangeHistories(GetService $service)
    {
        return new JsonResponse($service->getHistories());
    }
}
