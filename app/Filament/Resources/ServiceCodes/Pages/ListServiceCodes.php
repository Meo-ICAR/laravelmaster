<?php

namespace App\Filament\Resources\ServiceCodes\Pages;

use App\Filament\Resources\ServiceCodes\ServiceCodeResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListServiceCodes extends ListRecords
{
    protected static string $resource = ServiceCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
