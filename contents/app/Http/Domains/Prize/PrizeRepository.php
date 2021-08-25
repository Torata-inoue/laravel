<?php

namespace App\Http\Domains\Prize;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PrizeRepository extends BaseRepository
{
    public function __construct(Prize $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $prize_id
     * @return Prize
     */
    public function findById(int $prize_id): Prize
    {
        return $this->getQueryBuilder()
            ->find($prize_id);
    }

    /**
     * @return Collection
     */
    public function getPrizes(): Collection
    {
        return $this->getQueryBuilder()
            ->where('status', '=', Prize::STATUS_EXIST)
            ->get();
    }

    /**
     * @param Prize $prize
     * @return bool
     */
    public function save(Prize $prize): bool
    {
        return $prize->save();
    }
}
