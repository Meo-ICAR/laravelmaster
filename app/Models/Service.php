<?php

namespace App\Models;

use App\Traits\HasWhatsapp;
use Cheesegrits\FilamentGoogleMaps\Helpers\Geocode;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes, HasWhatsapp;

    protected $guarded = [];

    protected $appends = ['service_code_label'];

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

    public function quotations(): HasMany
    {
        return $this->hasMany(ProjectServiceQuotation::class);
    }

    public function serviceCodes(): BelongsToMany
    {
        return $this->belongsToMany(ServiceCode::class, 'service_service_code');
    }

    public function getServiceCodeLabelAttribute(): string
    {
        if ($this->relationLoaded('serviceCodes')) {
            return $this->serviceCodes->pluck('code')->filter()->implode(', ');
        }
        return $this->service_code ?: 'Non specificato';
    }
}
