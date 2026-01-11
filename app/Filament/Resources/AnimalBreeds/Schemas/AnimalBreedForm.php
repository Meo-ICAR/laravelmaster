<?php

namespace App\Filament\Resources\AnimalBreeds\Schemas;

use App\Models\Species;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;

class AnimalBreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                // Questo appare SOLO nel Relation Manager
                Placeholder::make('species_name')
                    ->label('Specie')
                    ->content(fn($livewire) => $livewire->getOwnerRecord()->name)
                    ->visible(fn($livewire) => $livewire instanceof RelationManager),
                // Questo appare SOLO nella pagina /create o /edit indipendente
                Select::make('species_id')
                    ->relationship('species', 'name')
                    ->hidden(fn($livewire) => $livewire instanceof RelationManager)
                    ->required(),
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category_group'),
                Textarea::make('standard_description')
                    ->columnSpanFull(),
            ]);
    }
}
