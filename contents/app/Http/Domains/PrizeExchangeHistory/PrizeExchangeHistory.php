<?php

namespace App\Http\Domains\PrizeExchangeHistory;

use App\Http\Domains\Prize\Prize;
use App\Http\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PrizeExchangeHistory extends Model
{
    const STATUS_APPLYING = 1;
    const STATUS_EXCHANGED = 2;
    const STATUS_REJECTED = 3;

    protected $guarded = ['id'];

    protected $with = ['User', 'Prize'];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo]
     */
    public function Prize(): BelongsTo
    {
        return $this->belongsTo(Prize::class, 'prize_id');
    }
}
