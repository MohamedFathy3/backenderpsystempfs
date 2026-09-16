<?php

namespace App\Repositories;

use App\Interfaces\StorageRepositoryInterface;
use App\Models\Storage;
use Illuminate\Database\Eloquent\Model;

class StorageRepository extends CrudRepository implements StorageRepositoryInterface
{
    protected Model $model;

    public function __construct(Storage $model)
    {
        $this->model = $model;
    }
}
