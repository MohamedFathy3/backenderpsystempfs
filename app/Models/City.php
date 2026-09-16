<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends BaseModel
{
    protected $guarded = ['id'];

    protected $casts = [
        'active' => 'boolean',
        'port_types' => 'array'
    ];

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }
}
