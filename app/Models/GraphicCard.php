<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property string $model
 * @property string $vram
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Device> $history
 * @property-read int|null $history_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard filter($filters = null, $filterOperator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard whereVram($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|GraphicCard withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Activitylog\Models\Activity> $activities
 * @property-read int|null $activities_count
 * @mixin \Eloquent
 */
class GraphicCard extends BaseModel
{
    protected $guarded = ['id'];


    public function history(): HasMany
    {
        return $this->hasMany(Device::class);
    }
}
