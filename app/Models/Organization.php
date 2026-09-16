<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends BaseModel
{
    protected $guarded = ['id'];

    protected $casts = [
        'ssl' => 'boolean'
    ];

    public function getAvatarAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }
}
