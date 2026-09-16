<?php

namespace App\Repositories;

use App\Interfaces\DeviceRepositoryInterface;
use App\Models\Device;
use Illuminate\Database\Eloquent\Model;

class DeviceRepository extends CrudRepository implements DeviceRepositoryInterface
{
    protected Model $model;

    public function __construct(Device $model)
    {
        $this->model = $model;
    }
}
