<?php

namespace App\Filament\Resources\AnimalBreeds\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class AnimalBreedForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('species_id')
                    ->relationship('species', 'name')
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
