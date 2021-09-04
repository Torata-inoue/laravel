<?php

namespace App\Http\Controllers\API\Redux\PointHistory;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\PointHistory\GetService;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    public function getPointHistories(GetService $service)
    {
        return new JsonResponse($service->getHistories());
    }
}
