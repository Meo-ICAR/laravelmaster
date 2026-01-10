<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProjectRole extends Model
{
    protected $table = 'project_roles';
    protected $guarded = [];

    protected $casts = [
        'requirements' => 'array',
        'is_open' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'n' => 'integer',
    ];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function actorApplications(): HasMany
    {
        return $this->hasMany(ProjectRoleActor::class);
    }

    public function animalApplications(): HasMany
    {
        return $this->hasMany(ProjectRoleAnimal::class);
    }

    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class, 'project_role_actors')
            ->withPivot(['status', 'director_notes'])
            ->withTimestamps();
    }

    public function animals(): BelongsToMany
    {
        return $this->belongsToMany(Animal::class, 'project_role_animals')
            ->withPivot(['status', 'director_notes'])
            ->withTimestamps();
    }
}
