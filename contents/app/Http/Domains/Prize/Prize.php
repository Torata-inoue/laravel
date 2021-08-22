<?php

namespace App\Http\Domains\Prize;

use Illuminate\Database\Eloquent\Model;

class Prize extends Model
{
    const STATUS_DELETED = 0;
    const STATUS_EXIST = 1;

    const DO_NOT_NEED_COMMENT = 0;
    const NEEDS_COMMENT = 1;
}
