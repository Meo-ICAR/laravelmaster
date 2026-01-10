<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Comune extends Model
{
    protected $table = 'comuni';

    protected $fillable = [
        'activity',
        'flag_active',
        'region_code',
        'province_code',
        'istat_code_comune',
        // Add other fillable fields as needed
        'comune_description',
        'comune_description_ita',
        'cap',
        'prefix',
        'email',
        'pec',
        'url',
        'latitude',
        'longitude',
        'altitude',
        'surface',
        'population',
    ];

    protected $casts = [
        'activity' => 'boolean',
        'population' => 'integer',
        'population_2011' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function regione(): BelongsTo
    {
        return $this->belongsTo(Regione::class, 'region_code', 'region_code');
    }

    public function provincia(): BelongsTo
    {
        return $this->belongsTo(Provincia::class, 'province_code', 'province_code');
    }
}
