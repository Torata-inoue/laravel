<?php

namespace App\Services\API\Redux\User;

use App\Http\Domains\User\User;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class GetService extends BaseService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * GetService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(
        UserRepository $userRepository
    )
    {
        parent::__construct();
        $this->userRepository = $userRepository;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->userRepository->getUsers()
            ->map([$this, 'setUserDetail'])
            ->all();
    }

    /**
     * @return array
     */
    public function findAuth(): array
    {
        return $this->setUserDetail($this->auth);
    }

    /**
     * @param int $user_id
     * @return array
     */
    public function findUser(int $user_id): array
    {
        $user = $this->userRepository->findUser($user_id);
        return $this->setUserDetail($user);
    }

    /**
     * @param User $user
     * @return array
     */
    private function setUserDetail(User $user): array
    {
        $rank = $user->Rank->name;
        $user = $user->getAttributes();
        $user['rank'] = $rank;
        return $user;
    }
}
