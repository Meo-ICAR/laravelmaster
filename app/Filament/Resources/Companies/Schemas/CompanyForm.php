<?php

namespace App\Filament\Resources\Companies\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CompanyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('website')
                    ->url(),
                TextInput::make('icon_url')
                    ->url(),
                TextInput::make('logo_url')
                    ->url(),
                TextInput::make('address'),
                TextInput::make('city'),
                TextInput::make('country'),
                TextInput::make('postal_code'),
                TextInput::make('vat_number'),
                TextInput::make('tax_code'),
                TextInput::make('pec'),
                TextInput::make('sdi_code'),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('stripe_id'),
                TextInput::make('pm_type'),
                TextInput::make('pm_last_four'),
                DateTimePicker::make('trial_ends_at'),
                Toggle::make('is_active')
                    ->required(),
                Toggle::make('is_superadmin')
                    ->required(),
            ]);
    }
}
