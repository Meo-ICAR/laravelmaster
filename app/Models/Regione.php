<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Regione extends Model
{
    protected $table = 'regioni';

    protected $fillable = [
        'activity',
        'flag_active',
        'region_code',
        'istat_code_region',
        'region_description',
    ];

    protected $casts = [
        'activity' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function province(): HasMany
    {
        return $this->hasMany(Provincia::class, 'region_code', 'region_code');
    }
}
