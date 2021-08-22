<?php

namespace App\Http\Controllers\API\Redux\User;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\User\GetService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetController extends Controller
{
    /**
     * @param GetService $service
     * @return JsonResponse
     */
    public function getUsers(GetService $service)
    {
        return new JsonResponse($service->getUsers());
    }

    /**
     * @param Request $request
     * @param GetService $service
     * @return JsonResponse
     */
    public function findUser(Request $request, GetService $service)
    {
        $user_id = $request->route()->parameter('user_id');
        return new JsonResponse($service->findUser($user_id));
    }

    /**
     * @param GetService $service
     * @return JsonResponse
     */
    public function findAuth(GetService $service)
    {
        return new JsonResponse($service->findAuth());
    }
}
