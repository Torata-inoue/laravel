<?php

namespace App\Http\Domains\PointHistory;

use App\Http\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PointHistory extends Model
{
    const TYPE_PROFITS = 1;
    const TYPE_PRIZE_EXCHANGE = 2;
    const TYPE_STAMINA_EXCHANGE = 3;
    const TYPE_RETURNED = 4;
    const TYPE_RANK_POINT = 5;
    const TYPE_LOGIN_BONUS = 6;

    const POINT_REJECTED = 0;

    protected $guarded = ['id'];

    protected $with = ['User'];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        switch ($this->type) {
            case self::TYPE_PRIZE_EXCHANGE :
                return '景品交換';

            case self::TYPE_STAMINA_EXCHANGE :
                return 'スタミナ交換';

            case self::TYPE_RANK_POINT :
                return 'ランクポイント';

            case self::TYPE_LOGIN_BONUS :
                return 'ログインボーナス';

            default :
                return '通常ポイント';
        }
    }
}
