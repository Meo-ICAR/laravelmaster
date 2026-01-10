<?php

namespace App\Filament\Resources\Animals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AnimalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('species_id')
                    ->relationship('species', 'name'),
                TextInput::make('animal_breed_id')
                    ->numeric(),
                TextInput::make('name'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'unknown' => 'Unknown']),
                DatePicker::make('birth_date'),
                TextInput::make('weight')
                    ->numeric(),
                Textarea::make('special_signs')
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('location'),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                Toggle::make('is_certified')
                    ->required(),
            ]);
    }
}
