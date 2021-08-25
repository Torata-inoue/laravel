<?php

namespace App\Http\Domains\PrizeExchangeHistory;

use App\Http\Domains\BaseRepository;

class PrizeExchangeHistoryRepository extends BaseRepository
{
    /**
     * @param PrizeExchangeHistory $prizeExchangeHistory
     * @return bool
     */
    public function save(PrizeExchangeHistory $prizeExchangeHistory): bool
    {
        return $prizeExchangeHistory->save();
    }
}
