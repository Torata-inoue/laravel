<?php

namespace App\Http\Domains;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = new $model;
    }

    /**
     * @return Builder
     */
    protected function getQueryBuilder(): Builder
    {
        return $this->model->newQuery();
    }
}
