<?php

namespace App\Filament\Resources\Locations\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class LocationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('address')
                    ->required(),
                TextInput::make('city')
                    ->required(),
                TextInput::make('province'),
                TextInput::make('postal_code'),
                TextInput::make('country')
                    ->required()
                    ->default('IT'),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                TextInput::make('contact_person'),
                TextInput::make('contact_phone')
                    ->tel(),
                TextInput::make('contact_email')
                    ->email(),
                TextInput::make('features'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Textarea::make('accessibility_camion')
                    ->columnSpanFull(),
                Textarea::make('parking_camion')
                    ->columnSpanFull(),
                TextInput::make('potenza_elettrica')
                    ->numeric(),
                TextInput::make('website')
                    ->url(),
                Toggle::make('is_water'),
                Toggle::make('is_consent_work'),
                TextInput::make('created_by')
                    ->numeric(),
                Toggle::make('is_active')
                    ->required(),
                Select::make('company_id')
                    ->relationship('company', 'name'),
            ]);
    }
}
