<?php

namespace App\Models;

use Cheesegrits\FilamentGoogleMaps\Helpers\Geocode;
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

    // Relazione con Company
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    protected static function booted()
    {
        static::creating(function ($model) {
            if (auth()->check()) {
                $model->user_id = auth()->id();
                $model->company_id = auth()->user()->company_id;
            }
        });
        static::saving(function ($model) {
            if ($model->isDirty(['city', 'province', 'country'])) {
                $model->geocodeViaPlugin();
            }
        });
    }

    /**
     * Utilizza la logica del plugin per ottenere le coordinate
     */
    public function geocodeViaPlugin()
    {
        $address = "{$this->city}, {$this->province}, {$this->country}";

        // Utilizziamo la classe Geocode del plugin
        // $result = Geocode::geocodeAddress($address);
        $result = Geocode::geocodeAddress($address);

        if ($result) {
            $this->latitude = $result['lat'];
            $this->longitude = $result['lng'];
        }
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function breed(): BelongsTo
    {
        return $this->belongsTo(AnimalBreed::class, 'animal_breed_id');
    }
}
