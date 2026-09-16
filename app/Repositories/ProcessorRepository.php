<?php

namespace App\Repositories;

use App\Interfaces\ProcessorRepositoryInterface;
use App\Models\Processor;
use Illuminate\Database\Eloquent\Model;

class ProcessorRepository extends CrudRepository implements ProcessorRepositoryInterface
{
    protected Model $model;

    public function __construct(Processor $model)
    {
        $this->model = $model;
    }
}
