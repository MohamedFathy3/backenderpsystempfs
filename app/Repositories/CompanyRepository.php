<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class CompanyRepository extends CrudRepository implements CompanyRepositoryInterface
{
    protected Model $model;

    public function __construct(Company $model)
    {
        $this->model = $model;
    }
}
