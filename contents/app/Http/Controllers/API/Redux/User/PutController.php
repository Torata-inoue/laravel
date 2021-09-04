<?php

namespace App\Http\Controllers\API\Redux\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\PutRequest;
use App\Services\API\Redux\User\PutService;
use Illuminate\Http\JsonResponse;

class PutController extends Controller
{
    /**
     * @param PutRequest $request
     * @param PutService $service
     * @return JsonResponse
     */
    public function editUser(PutRequest $request, PutService $service)
    {
        $data = $request->input();

        return new JsonResponse($service->editUser($data));
    }

    public function recoverStamina(PutService $service)
    {
        $auth = $service->recoverStamina();
        return new JsonResponse($auth);
    }
}
