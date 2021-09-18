<?php

namespace App\Http\Domains\PrizeExchangeHistory;

use App\Http\Domains\BaseRepository;
use Illuminate\Database\Eloquent\Collection;

class PrizeExchangeHistoryRepository extends BaseRepository
{
    public function __construct(PrizeExchangeHistory $model)
    {
        parent::__construct($model);
    }

    /**
     * @param int $user_id
     * @return Collection
     */
    public function getHistories(int $user_id): Collection
    {
        return $this->getQueryBuilder()
            ->where('user_id', '=', $user_id)
            ->orderBy('id', 'desc')
            ->get();
    }

    /**
     * @param PrizeExchangeHistory $prizeExchangeHistory
     * @return bool
     */
    public function save(PrizeExchangeHistory $prizeExchangeHistory): bool
    {
        return $prizeExchangeHistory->save();
    }
}
