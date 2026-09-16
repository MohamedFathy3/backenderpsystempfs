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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereSize($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Memory withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class Memory extends BaseModel
{
    protected $guarded = ['id'];

    public function history(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
