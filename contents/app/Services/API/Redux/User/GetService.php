<?php

namespace App\Services\API\Redux\User;

use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\User\User;
use App\Http\Domains\User\UserRepository;
use App\Services\BaseService;

class GetService extends BaseService
{
    use UserTrait;

    /**
     * @var UserRepository
     */
    private $userRepository;

    private $pointHistoryRepository;

    /**
     * GetService constructor.
     * @param UserRepository $userRepository
     * @param PointHistoryRepository $pointHistoryRepository
     */
    public function __construct(
        UserRepository $userRepository,
        PointHistoryRepository $pointHistoryRepository
    )
    {
        parent::__construct($userRepository);
        $this->userRepository = $userRepository;
        $this->pointHistoryRepository = $pointHistoryRepository;
    }

    /**
     * @return array
     */
    public function getUsers(): array
    {
        return $this->userRepository->getUsers()
            ->map(function (User $user) {
                $rank = $user->Rank->name;
                $user = $user->getAttributes();
                $user['rank'] = $rank;
                return $user;
            })
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
     * @return PointHistoryRepository
     */
    protected function getPointHistoryRepository(): PointHistoryRepository
    {
        return $this->pointHistoryRepository;
    }
}
