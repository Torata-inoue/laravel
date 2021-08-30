<?php


namespace App\Services\API\Redux\User;


use App\Http\Domains\PointHistory\PointHistoryRepository;
use App\Http\Domains\User\User;

trait UserTrait
{
    abstract protected function getPointHistoryRepository(): PointHistoryRepository;

    /**
     * @param User $user
     * @return array
     */
    protected function setUserDetail(User $user): array
    {
        $rank = $user->Rank->name;
        $user = $user->getAttributes();
        $user['rank'] = $rank;
        $user['point'] = $this->getPointHistoryRepository()->sumPoints($user['id']);
        return $user;
    }
}
