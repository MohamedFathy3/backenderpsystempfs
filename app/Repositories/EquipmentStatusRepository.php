<?php

namespace App\Repositories;

use App\Interfaces\EquipmentStatusRepositoryInterface;
use App\Models\EquipmentStatus;
use Illuminate\Database\Eloquent\Model;

class EquipmentStatusRepository extends CrudRepository implements EquipmentStatusRepositoryInterface
{
    protected Model $model;

    public function __construct(EquipmentStatus $model)
    {
        $this->model = $model;
    }
}
