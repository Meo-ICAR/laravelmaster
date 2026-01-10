<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'provincie';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'activity',
        'flag_active',
        'region_code',
        'istat_code_province',
        'province_code',
        'province_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'activity' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the region that owns the province.
     */
    public function regione()
    {
        return $this->belongsTo(Regione::class, 'region_code', 'region_code');
    }

    /**
     * Get the comuni for the province.
     */
    public function comuni()
    {
        return $this->hasMany(Comune::class, 'province_code', 'province_code');
    }
}
