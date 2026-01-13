<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser, HasAvatar
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    // ... existing code (fillable, hidden, etc.)

    /**
     * Determine if the user can access the Filament panel.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        // Se l'utente ha un avatar_url (da Google), usa quello, altrimenti null
        return $this->avatar_url;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        // For local development, you might allow everyone.
        // In production, you might use: return str_ends_with($this->email, '@yourdomain.com');
        return true;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url',
        'email_verified_at',
        'company_id',
        'role_id',
        'privacy_policy_accepted_at',
        'terms_accepted_at',
        'marketing_consent',
        'newsletter_subscription',
        'data_processing_consent',
        'data_processing_consent_at',
        'data_erasure_requested_at',
        'data_anonymized_at',
        'ip_address',
        'user_agent',
        'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }

    public function shortlists(): HasMany
    {
        return $this->hasMany(Shortlist::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->role && $this->role->slug === $role;
    }

    public function scopeWithRole($query, $role)
    {
        return $query->whereHas('role', function ($q) use ($role) {
            $q->where('slug', $role);
        });
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
