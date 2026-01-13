<?php

namespace App\Filament\Resources\ProjectLocationOffers\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectLocationOfferForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('project_location_id')
                    ->relationship('projectLocation', 'name')
                    ->required(),
                Select::make('location_id')
                    ->relationship('location', 'name')
                    ->required(),
                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('$'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                Select::make('status')
                    ->options(['pending' => 'Pending', 'accepted' => 'Accepted', 'rejected' => 'Rejected'])
                    ->default('pending')
                    ->required(),
                DatePicker::make('valid_until')
                    ->required(),
            ]);
    }
}
