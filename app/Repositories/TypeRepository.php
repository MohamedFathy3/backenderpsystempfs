<?php

namespace App\Repositories;

use App\Interfaces\TypeRepositoryInterface;
use App\Models\Type;
use Illuminate\Database\Eloquent\Model;

class TypeRepository extends CrudRepository implements TypeRepositoryInterface
{
    protected Model $model;

    public function __construct(Type $model)
    {
        $this->model = $model;
    }
}
