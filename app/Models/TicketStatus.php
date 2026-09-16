<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
/**
 * 
 *
 * @property int $id
 * @property int $ticket_id
 * @property string $status
 * @property int|null $updated_by
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Ticket $ticket
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedBy($value)
 * @property int|null $updated_by_id
 * @property int|null $transfer_to_id
 * @property int|null $duration
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $transferTo
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereTransferToId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TicketStatus whereUpdatedById($value)
 * @mixin \Eloquent
 */
class TicketStatus extends Model
{
    use LogsActivity;
    protected $guarded = ['id'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }
    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * The user who updated this status.
     */
    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }
    public function transferTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'transfer_to_id');
    }
}


