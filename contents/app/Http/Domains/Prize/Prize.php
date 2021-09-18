<?php

namespace App\Http\Domains\Prize;

use App\Http\Domains\Rank\Rank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prize extends Model
{
    const STATUS_DELETED = 0;
    const STATUS_EXIST = 1;

    const DO_NOT_NEED_COMMENT = 0;
    const NEEDS_COMMENT = 1;

    /**
     * @return BelongsTo
     */
    public function Rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'rank');
    }
}
