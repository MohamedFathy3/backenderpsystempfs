<?php

namespace App\Repositories;

use App\Interfaces\PositionRepositoryInterface;
use App\Models\Position;
use Illuminate\Database\Eloquent\Model;

class PositionRepository extends CrudRepository implements PositionRepositoryInterface
{
    protected Model $model;

    public function __construct(Position $model)
    {
        $this->model = $model;
    }
}
