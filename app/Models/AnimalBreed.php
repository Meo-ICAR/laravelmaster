<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AnimalBreed extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = ['species_id', 'name', 'slug', 'standard_description'];
    protected static ?string $recordTitleAttribute = 'name';

    protected static function booted()
    {
        static::creating(function ($breed) {
            // Se lo slug non è già stato impostato, lo generiamo dal nome
            if (empty($breed->slug)) {
                $breed->slug = Str::slug($breed->name);
            }
        });
    }

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
