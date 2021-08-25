<?php

namespace App\Services;

use App\Http\Domains\User\UserRepository;

abstract class BaseService
{
    protected $auth;

    /**
     * BaseService constructor.
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->auth = $userRepository->findUser(8);
    }
}
