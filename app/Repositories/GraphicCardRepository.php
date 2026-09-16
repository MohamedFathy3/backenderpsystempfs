<?php

namespace App\Repositories;

use App\Interfaces\GraphicCardRepositoryInterface;
use App\Models\Brand;
use App\Models\GraphicCard;
use Illuminate\Database\Eloquent\Model;

class GraphicCardRepository extends CrudRepository implements GraphicCardRepositoryInterface
{
    protected Model $model;

    public function __construct(GraphicCard $model)
    {
        $this->model = $model;
    }
}
