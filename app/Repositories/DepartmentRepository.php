<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\DepartmentRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepository extends CrudRepository implements DepartmentRepositoryInterface
{
    protected Model $model;

    public function __construct(Department $model)
    {
        $this->model = $model;
    }
}
