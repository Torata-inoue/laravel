<?php

namespace App\Http\Domains\User;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class UserRepository extends BaseRepository
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    /**
     * @return Builder
     */
    public function getQueryBuilder(): Builder
    {
        return $this->model->newQuery()
            ->select(['id', 'name', 'comment', 'icon_path', 'stamina', 'rank']);
    }

    /**
     * @return Collection
     */
    public function getUsers(): Collection
    {
        return $this->getQueryBuilder()
            ->where('status', '=', User::STATUS_EXIST)
            ->get();
    }

    /**
     * @param int $user_id
     * @return User|null
     */
    public function findUser(int $user_id): ?User
    {
        return $this->getQueryBuilder()
            ->find($user_id);
    }

    /**
     * @param User $user
     * @return bool
     */
    public function save(User $user)
    {
        return $user->save();
    }
}
