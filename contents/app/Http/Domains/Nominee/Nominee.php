<?php

namespace App\Http\Domains\Nominee;

use App\Http\Domains\Comment\Comment;
use App\Http\Domains\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Nominee extends Model
{
    public $timestamps = false;

    protected $guarded = ['id'];

    protected $with = ['User', 'Comment'];

    /**
     * @return BelongsTo
     */
    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function Comment(): BelongsTo
    {
        return $this->belongsTo(Comment::class, 'comment_id');
    }
}
