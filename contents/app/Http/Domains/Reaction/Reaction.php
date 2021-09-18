<?php

namespace App\Http\Domains\Reaction;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reaction extends Model
{
    const UPDATED_AT = null;

    const TYPE_AUTO = 0;
    const TYPE_GOOD = 1;

    protected $guarded = ['id'];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function Target(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function Comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class);
    }
}
