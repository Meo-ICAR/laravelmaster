<?php

namespace App\Filament\Resources\ServiceCodes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceCodeForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('area')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                TextInput::make('origin'),
            ]);
    }
}
