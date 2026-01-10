<?php

namespace App\Filament\Resources\CastSources\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CastSourceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('base_url')
                    ->url()
                    ->required(),
                TextInput::make('list_url')
                    ->url(),
                TextInput::make('adapter_class'),
                TextInput::make('selectors'),
                TextInput::make('rate_limit_per_minute')
                    ->required()
                    ->numeric()
                    ->default(60),
                Toggle::make('active')
                    ->required(),
                DateTimePicker::make('last_scraped_at'),
            ]);
    }
}
