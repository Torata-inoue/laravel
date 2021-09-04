<?php

namespace App\Http\Domains\PointHistory;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PointHistoryRepository extends BaseRepository
{
    public function __construct(PointHistory $model)
    {
        parent::__construct($model);
    }

    public function getHistories(int $user_id): Collection
    {
        return $this->getQueryBuilder()
            ->where('user_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param int $user_id
     * @return int
     */
    public function sumPoints(int $user_id): int
    {
        return $this->getQueryBuilder()
            ->where('user_id', '=', $user_id)
            ->sum('points');
    }

    /**
     * @param PointHistory $pointHistory
     * @return bool
     */
    public function save(PointHistory $pointHistory): bool
    {
        return $pointHistory->save();
    }
}
