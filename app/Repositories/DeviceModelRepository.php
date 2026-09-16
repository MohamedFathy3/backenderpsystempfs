<?php

namespace App\Repositories;

use App\Interfaces\DeviceModelRepositoryInterface;
use App\Models\DeviceModel;
use App\Models\Processor;
use Illuminate\Database\Eloquent\Model;

class DeviceModelRepository extends CrudRepository implements DeviceModelRepositoryInterface
{
    protected Model $model;

    public function __construct(DeviceModel $model)
    {
        $this->model = $model;
    }
}
