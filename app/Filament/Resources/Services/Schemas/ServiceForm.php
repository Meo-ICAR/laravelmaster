<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('contact_name'),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('mobile'),
                TextInput::make('address'),
                TextInput::make('city'),
                TextInput::make('province'),
                TextInput::make('postal_code'),
                TextInput::make('country')
                    ->required()
                    ->default('IT'),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                TextInput::make('travel_km')
                    ->numeric(),
                Textarea::make('storage')
                    ->columnSpanFull(),
                Textarea::make('transport')
                    ->columnSpanFull(),
                Select::make('service_type_id')
                    ->relationship('serviceType', 'name'),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('website')
                    ->url(),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->required(),
                Select::make('user_id')
                    ->relationship('user', 'name'),
                Select::make('company_id')
                    ->relationship('company', 'name'),
            ]);
    }
}
