<?php

namespace App\Http\Domains\Rank;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    public $timestamps = false;

    const BRONZE = 1;
    const SILVER = 2;
    const GOLD = 3;
    const DIAMOND = 4;
}
