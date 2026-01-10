<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AnimalBreed extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function species(): BelongsTo
    {
        return $this->belongsTo(Species::class);
    }

    public function animals(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
