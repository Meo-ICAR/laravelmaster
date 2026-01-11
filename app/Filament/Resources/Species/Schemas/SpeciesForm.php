<?php

namespace App\Filament\Resources\Species\Schemas;

use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Guava\IconPicker\Forms\Components\IconPicker;

class SpeciesForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                IconPicker::make('icon')
                    ->label('Icona della Razza')
                    ->columns([
                        'default' => 1,
                        'lg' => 3,
                    ]),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('slug')
                    ->required(),
            ]);
    }
}
