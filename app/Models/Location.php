<?php

namespace App\Models;

use App\Models\User;
use App\Traits\HasWhatsapp;  // <--- Importa il Trait
use Cheesegrits\FilamentGoogleMaps\Helpers\Geocode;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Location extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;
    use HasWhatsapp;  // <--- Attivalo qui

    /**
     * Get all offers for this location.
     */
    public function offers(): HasMany
    {
        return $this->hasMany(ProjectLocationOffer::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'website',
        'address',
        'city',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'contact_person',
        'contact_phone',
        'contact_email',
        'features',
        'notes',
        'is_active',
        'created_by',
        'company_id',
        'accessibility_camion',
        'parking_camion',
        'power_electricity',
        'website',
        'has_water',
        'has_consent_work',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'features' => 'array',
        'is_active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    // Relazione con User
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
     * Scope a query to only include active locations.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the full address as a single string.
     */
    public function getFullAddressAttribute(): string
    {
        $parts = [
            $this->address,
            $this->postal_code,
            $this->city,
            $this->province,
            $this->country,
        ];

        return implode(', ', array_filter($parts));
    }

    /**
     * Check if the location has coordinates.
     */
    public function hasCoordinates(): bool
    {
        return !is_null($this->latitude) && !is_null($this->longitude);
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

    /**
     * Register the media collections.
     */
    public function registerMediaCollections(): void
    {
        $this
            ->addMediaCollection('photos')
            ->useDisk('public')
            ->singleFile(false)
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp', 'image/gif']);
    }

    /**
     * Register the conversions for media files.
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->width(300)
            ->height(300)
            ->sharpen(10)
            ->optimize()
            ->performOnCollections('photos');

        $this
            ->addMediaConversion('preview')
            ->width(800)
            ->height(600)
            ->sharpen(10)
            ->optimize()
            ->performOnCollections('photos');
    }

    /**
     * Get all the photos for the location.
     */
    public function getPhotosAttribute()
    {
        return $this->getMedia('photos');
    }

    /**
     * Get the primary photo for the location.
     */
    public function getPrimaryPhotoAttribute()
    {
        return $this->getFirstMedia('photos');
    }

    /**
     * Get the main photo URL.
     */
    public function getMainPhotoUrlAttribute(): ?string
    {
        return $this->primary_photo?->getUrl('preview');
    }

    /**
     * Get the thumbnail URL.
     */
    public function getThumbnailUrlAttribute(): ?string
    {
        return $this->primary_photo?->getUrl('thumb');
    }
}
