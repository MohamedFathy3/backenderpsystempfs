<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property int|null $size
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $devices
 * @property-read int|null $devices_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Storage withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class Storage extends BaseModel
{
    protected $guarded = ['id'];

    public function devices()
    {
        return $this->belongsToMany(Device::class, 'device_storage')
            ->withPivot('type')
            ->withTimestamps();
    }

    public function history(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
