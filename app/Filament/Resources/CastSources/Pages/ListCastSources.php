<?php

namespace App\Filament\Resources\CastSources\Pages;

use App\Filament\Resources\CastSources\CastSourceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCastSources extends ListRecords
{
    protected static string $resource = CastSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
