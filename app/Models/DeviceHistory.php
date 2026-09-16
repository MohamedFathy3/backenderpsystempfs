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
 * @property int $device_id
 * @property int|null $employee_id
 * @property int|null $help_desk_id
 * @property int|null $ticket_id
 * @property string $action_type
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Device $device
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\User|null $helpDesk
 * @property-read \App\Models\Ticket|null $ticket
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereActionType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereHelpDeskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceHistory whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class DeviceHistory extends Model
{
    use LogsActivity;

    protected $fillable = [
        'device_id',
        'employee_id',
        'help_desk_id',
        'ticket_id',
        'action_type',
        'note',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['*']);
    }


    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function helpDesk(): BelongsTo
    {
        return $this->belongsTo(User::class, 'help_desk_id');
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }
}
