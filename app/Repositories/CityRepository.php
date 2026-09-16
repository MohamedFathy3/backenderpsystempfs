<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Database\Eloquent\Model;

class CityRepository extends CrudRepository implements CityRepositoryInterface
{
    protected Model $model;

    public function __construct(City $model)
    {
        $this->model = $model;
    }
}
