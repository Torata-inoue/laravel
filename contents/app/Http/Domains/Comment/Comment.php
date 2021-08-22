<?php

namespace App\Http\Domains\Comment;

use App\Http\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    const STATUS_DELETED = 0;
    const STATUS_EXIST = 0;

    const NOT_REPLY_COMMENT = 0;

    protected $guarded = ['id'];

    protected $with = ['User'];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
