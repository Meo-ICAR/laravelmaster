<?php

namespace App\Filament\Resources\ProjectServiceQuotations\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectServiceQuotationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('project_service_id')
                    ->required()
                    ->numeric(),
                TextInput::make('service_id')
                    ->numeric(),
                TextInput::make('status')
                    ->required()
                    ->default('proposta'),
                Textarea::make('notes')
                    ->columnSpanFull(),
                TextInput::make('proposed_price')
                    ->numeric()
                    ->prefix('$'),
                TextInput::make('final_price')
                    ->numeric()
                    ->prefix('$'),
                DatePicker::make('valid_until'),
                Textarea::make('rejection_reason')
                    ->columnSpanFull(),
            ]);
    }
}
