<?php

namespace App\Filament\Resources\ProjectServiceQuotations\Schemas;

use App\Models\ProjectServiceQuotation;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ProjectServiceQuotationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('project_service_id')
                    ->numeric(),
                TextEntry::make('service_id')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status'),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('proposed_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('final_price')
                    ->money()
                    ->placeholder('-'),
                TextEntry::make('valid_until')
                    ->date()
                    ->placeholder('-'),
                TextEntry::make('rejection_reason')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('deleted_at')
                    ->dateTime()
                    ->visible(fn (ProjectServiceQuotation $record): bool => $record->trashed()),
            ]);
    }
}
