<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int|null $brand_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DeviceModel withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class DeviceModel extends BaseModel
{
    protected $guarded = ['id'];

    public function history(): HasMany
    {
        return $this->hasMany(Device::class);
    }

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }
}
