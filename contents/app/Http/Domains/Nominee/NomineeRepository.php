<?php

namespace App\Http\Domains\Nominee;

use App\Http\Domains\BaseRepository;

class NomineeRepository extends BaseRepository
{
    public function __construct(Nominee $model)
    {
        parent::__construct($model);
    }

    /**
     * @param array $data
     */
    public function bulkInsert(array $data)
    {
        $this->getQueryBuilder()
            ->insert($data);
    }
}
