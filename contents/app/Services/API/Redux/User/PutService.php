<?php

namespace App\Services\API\Redux\User;

use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class PutService extends BaseService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * PostService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     */
    public function editUser(array $data)
    {
        $this->auth->fill($data);
        $this->userRepository->save($this->auth);
    }
}
