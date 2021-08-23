<?php

namespace App\Http\Domains\User;

use App\Http\Domains\Rank\Rank;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const PERMISSION_USER = 1;
    const PERMISSION_ADMIN = 2;

    const STATUS_DELETED = 0;
    const STATUS_EXIST = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return BelongsTo
     */
    public function Rank(): BelongsTo
    {
        return $this->belongsTo(Rank::class, 'rank');
    }
}
