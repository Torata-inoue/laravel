<?php

namespace App\Http\Domains\Reaction;

use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    const UPDATED_AT = null;

    const TYPE_AUTO = 0;
    const TYPE_GOOD = 1;

    protected $guarded = ['id'];
}
