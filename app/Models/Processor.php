<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Processor withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class Processor extends BaseModel
{
    protected $guarded = ['id'];

    public function history(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
