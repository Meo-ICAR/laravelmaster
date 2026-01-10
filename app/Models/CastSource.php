<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CastSource extends Model
{
    protected $table = 'castsources';
    protected $guarded = [];

    protected $casts = [
        'selectors' => 'array',
        'active' => 'boolean',
        'last_scraped_at' => 'datetime',
    ];
}
