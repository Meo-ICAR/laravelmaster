<?php

namespace App\Models;

use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Cashier\Billable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Company extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'email',
        'phone',
        'website',
        'icon_url',
        'logo_url',
        'address',
        'city',
        'country',
        'postal_code',
        'vat_number',
        'tax_code',
        'pec',
        'sdi_code',
        'slug',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
        'is_active',
        'is_superadmin',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Get all users that belong to the company.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    /**
     * Get all projects that belong to the company.
     */
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function directorsAndAdmins()
    {
        return $this->users()->isDirector();
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }

    public function actors(): HasMany
    {
        return $this->hasMany(Actor::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
