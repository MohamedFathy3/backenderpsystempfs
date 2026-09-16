<?php

namespace App\Repositories;

use App\Interfaces\ReplyRepositoryInterface;
use App\Models\Reply;
use Illuminate\Database\Eloquent\Model;

class ReplyRepository extends CrudRepository implements ReplyRepositoryInterface
{
    protected Model $model;

    public function __construct(Reply $model)
    {
        $this->model = $model;
    }
}
