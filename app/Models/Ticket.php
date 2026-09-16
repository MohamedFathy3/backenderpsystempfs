<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

/**
 *
 *
 * @property int $id
 * @property string|null $ticket_number
 * @property string|null $title
 * @property string|null $content
 * @property \App\Models\Category|null $category
 * @property \Illuminate\Support\Carbon|null $open_at
 * @property \Illuminate\Support\Carbon|null $close_at
 * @property string|null $postpone_note
 * @property string $status
 * @property int|null $employee_id
 * @property int|null $help_desk_id
 * @property int|null $created_by_id
 * @property int|null $device_id
 * @property string|null $priority
 * @property string $rating
 * @property int $ata_time
 * @property int|null $daily_time
 * @property bool $daily_status
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\Device|null $device
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $deviceHistories
 * @property-read int|null $device_histories_count
 * @property-read \App\Models\User|null $employee
 * @property-read \App\Models\User|null $helpDesk
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Reply> $replies
 * @property-read int|null $replies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TicketStatus> $statuses
 * @property-read int|null $statuses_count
 * @property-read \App\Models\User|null $transferTo
 * @property-read \App\Models\User|null $updatedBy
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereAtaTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCloseAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedById($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDailyStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDailyTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereEmployeeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereHelpDeskId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereOpenAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePostponeNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTicketNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket withoutTrashed()
 * @mixin \Eloquent
 */
class Ticket extends BaseModel
{
    protected $guarded = ['id'];

    public function getAvatarAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    protected $casts = [
        'open_at' => 'datetime',
        'close_at' => 'datetime',
        'priority' => 'string',
        'rating' => 'integer',
        'daily_status' => 'boolean',
    ];


    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }

    public function helpDesk(): BelongsTo
    {
        return $this->belongsTo(User::class, 'help_desk_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by_id');
    }

    public function transferTo(): BelongsTo
    {
        return $this->belongsTo(User::class, 'transfer_to_id');
    }

    public function device(): BelongsTo
    {
        return $this->belongsTo(Device::class);
    }

    public function deviceHistories(): HasManyThrough
    {
        return $this->hasManyThrough(DeviceHistory::class, Device::class);
    }

    public function getRatingAttribute($value): string
    {
        return (is_null($value)) ? '0' : $value;
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(TicketStatus::class);
    }
}
