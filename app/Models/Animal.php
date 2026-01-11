<?php

namespace App\Models;

use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Animal extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        'birth_date' => 'date',
        'weight' => 'decimal:2',
        'latitude' => 'decimal:2',
        'longitude' => 'decimal:2',
        'is_certified' => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    // Relazione con Company
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(AnimalBreed::class, 'animal_breed_id');
    }
}
