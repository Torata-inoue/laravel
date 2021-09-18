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
        return [
            'id' => $user->id,
            'name' => $user->name,
            'rank' => $user->Rank->name,
            'point' => $this->getPointHistoryRepository()->sumPoints($user['id']),
            'stamina' => $user->stamina,
            'comment' => $user->comment,
            'icon_path' => $user->getImagePath()
        ];
    }
}
