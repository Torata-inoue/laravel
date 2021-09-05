<?php

namespace App\Services\API\Redux\Image;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreService
{
    public function storeImage($file, string $path = ''): string
    {
        $name = Str::random(10) . '.' . $file->extension();
        Storage::disk('public')->putFileAs(
            "uploads/{$path}", $file, $name
        );
        return $name;
    }
}
