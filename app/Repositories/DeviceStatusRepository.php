<?php

namespace App\Repositories;

use App\Interfaces\DeviceStatusRepositoryInterface;
use App\Models\DeviceStatus;
use Illuminate\Database\Eloquent\Model;

class DeviceStatusRepository extends CrudRepository implements DeviceStatusRepositoryInterface
{
    protected Model $model;

    public function __construct(DeviceStatus $model)
    {
        $this->model = $model;
    }
}
