<?php

namespace App\Repositories;

use App\Interfaces\TicketRepositoryInterface;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Model;

class TicketRepository extends CrudRepository implements TicketRepositoryInterface
{
    protected Model $model;

    public function __construct(Ticket $model)
    {
        $this->model = $model;
    }
}
