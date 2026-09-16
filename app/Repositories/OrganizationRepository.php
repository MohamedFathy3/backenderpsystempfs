<?php

namespace App\Repositories;

use App\Interfaces\OrganizationRepositoryInterface;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Model;

class OrganizationRepository extends CrudRepository implements OrganizationRepositoryInterface
{
    protected Model $model;

    public function __construct(Organization $model)
    {
        $this->model = $model;
    }
}
