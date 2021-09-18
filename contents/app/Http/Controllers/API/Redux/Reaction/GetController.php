<?php

namespace App\Http\Controllers\API\Redux\Reaction;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\Reaction\GetService;
use Illuminate\Http\JsonResponse;

class GetController extends Controller
{
    public function getReactions(GetService $service)
    {
        $data = [
            'receive' => $service->getReceiveReactions(),
            'send' => $service->getSendReactions()
        ];
        return new JsonResponse($data);
    }
}
