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
     * @return string
     */
    public function getStatus(): string
    {
        switch ($this->status) {
            case self::STATUS_EXCHANGED :
                return '交換済み';

            case self::STATUS_REJECTED :
                return '交換拒否';

            default :
                return '申請中';
        }
    }

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
