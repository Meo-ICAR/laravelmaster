<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class ProjectLocationOffer extends Model
{
    protected $fillable = [
        'project_location_id',
        'location_id',
        'price',
        'notes',
        'status',
        'valid_until',
        'company_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'valid_until' => 'date',
    ];

    public function projectLocation(): BelongsTo
    {
        return $this->belongsTo(ProjectLocation::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    // Relazione con Company
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
