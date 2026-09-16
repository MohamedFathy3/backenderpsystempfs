<?php

namespace App\Repositories;

use App\Interfaces\MemoryRepositoryInterface;
use App\Models\Memory;
use Illuminate\Database\Eloquent\Model;

class MemoryRepository extends CrudRepository implements MemoryRepositoryInterface
{
    protected Model $model;

    public function __construct(Memory $model)
    {
        $this->model = $model;
    }
}
