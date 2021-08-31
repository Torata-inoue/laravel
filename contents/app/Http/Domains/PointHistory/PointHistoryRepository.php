<?php

namespace App\Http\Domains\PointHistory;

use App\Http\Domains\BaseRepository;

class PointHistoryRepository extends BaseRepository
{
    public function __construct(PointHistory $model)
    {
        parent::__construct($model);
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
