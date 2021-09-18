<?php

namespace App\Http\Controllers\API\Redux\Prize;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\Prize\GetService;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    public function getPrizes(GetService $service)
    {
        return new JsonResponse($service->getPrizes());
    }
}
