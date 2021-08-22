<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class BaseService
{
    protected $auth;

    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->auth = Auth::user();
    }
}
