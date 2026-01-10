<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull(),
                TextInput::make('production_company'),
                TextInput::make('type')
                    ->required()
                    ->default('feature_film'),
                TextInput::make('status')
                    ->required()
                    ->default('casting'),
                DatePicker::make('start_date'),
                TextInput::make('city'),
                Select::make('company_id')
                    ->relationship('company', 'name'),
            ]);
    }
}
