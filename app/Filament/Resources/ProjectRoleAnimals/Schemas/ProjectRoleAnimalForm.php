<?php

namespace App\Filament\Resources\ProjectRoleAnimals\Schemas;

use App\Enums\ApplicationStatus;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectRoleAnimalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_role_id')
                    ->required()
                    ->numeric(),
                Select::make('animal_id')
                    ->relationship('animal', 'name')
                    ->required(),
                Select::make('status')
                    ->options(ApplicationStatus::class)
                    ->default('pending')
                    ->required(),
                Textarea::make('cover_letter')
                    ->columnSpanFull(),
                Textarea::make('director_notes')
                    ->columnSpanFull(),
            ]);
    }
}
