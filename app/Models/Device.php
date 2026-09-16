<?php

namespace App\Models;

use App\Enums\UserRole;
use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;

/**
 *
 *
 * @property int $id
 * @property string $serial_number
 * @property string $condition
 * @property bool $active
 * @property string|null $note
 * @property \Illuminate\Support\Carbon|null $purchase_date
 * @property \Illuminate\Support\Carbon|null $warranty_expire_date
 * @property int|null $user_id
 * @property int|null $company_id
 * @property int|null $created_by_user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $memory_id
 * @property int|null $graphic_card_id
 * @property int|null $processor_id
 * @property int|null $brand_id
 * @property int|null $device_model_id
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Company|null $company
 * @property-read \App\Models\Processor|null $cpu
 * @property-read \App\Models\User|null $createdBy
 * @property-read \App\Models\User|null $currentEmployee
 * @property-read \App\Models\DeviceModel|null $deviceModel
 * @property-read \App\Models\GraphicCard|null $gpu
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DeviceHistory> $history
 * @property-read int|null $history_count
 * @property-read \App\Models\Memory|null $memory
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Storage> $storages
 * @property-read int|null $storages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Ticket> $tickets
 * @property-read int|null $tickets_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereCreatedByUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereDeviceModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereGraphicCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereMemoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereProcessorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device wherePurchaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereSerialNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device whereWarrantyExpireDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Device withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class Device extends BaseModel
{
    protected $guarded = ['id'];

    // Cast attributes to specific types
    protected $casts = [
        'active' => 'boolean',
        'warranty_expire_date' => 'date',
        'purchase_date' => 'date',
    ];


    public function currentEmployee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user_id');
    }

    public function memory(): BelongsTo
    {
        return $this->belongsTo(Memory::class, 'memory_id');
    }


     public function deviceStatus(): BelongsTo
    {
        return $this->belongsTo(DeviceStatus::class);
    }

    public function storages()
    {
        return $this->belongsToMany(Storage::class, 'device_storage')
            ->withPivot('type')
            ->withTimestamps();
    }


    // public function storage(): BelongsTo
    // {
    //     return $this->belongsTo(Storage::class);
    // }

    public function gpu(): BelongsTo
    {
        return $this->belongsTo(GraphicCard::class, 'graphic_card_id');
    }

    public function cpu(): BelongsTo
    {
        return $this->belongsTo(Processor::class, 'processor_id');
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function deviceModel(): BelongsTo
    {
        return $this->belongsTo(DeviceModel::class, 'device_model_id');
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function assignToUser(User $user): void
    {
        $this->history()->create([
            'employee_id' => $user->id,
            'action_type' => 'assign',
            'note' => 'Device assigned to user',
        ]);

        $this->user_id = $user->id;
        $this->save();
    }

    public function history(): HasMany
    {
        return $this->hasMany(DeviceHistory::class);
    }

    /**
     * @throws Exception
     */
    public function updateDevice(array $deviceData, User $adminUser): void
    {
        if (!in_array($adminUser->role, [UserRole::ADMIN->value, UserRole::HELP_DESK->value])) {
            throw new Exception("Only admins or help desk can update devices.");
        }
        $this->history()->create([
            'employee_id' => $adminUser->id,
            'action_type' => 'update',
            'note' => 'Device updated',
        ]);
        $this->update($deviceData);
    }

    public function markAsInactive(): void
    {
        $this->update(['active' => false]);
    }

    public function usersFromHistory(): Collection
    {
        return User::whereIn('id', $this->history()->pluck('employee_id')->unique())
            ->whereNotNull('id')
            ->orderByDesc('created_at')
            ->get();
    }
}
