<?php

namespace App\Http\Controllers\API\Redux\Image;

use App\Http\Controllers\Controller;
use App\Services\API\Redux\Image\StoreService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function storeUser(Request $request, StoreService $service)
    {
        $file = $request->file('file');
        $icon_path = $service->storeImage($file, 'user');
        return new JsonResponse($icon_path);
    }
}
