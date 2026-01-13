<?php

namespace App\Filament\Resources\ProjectServiceQuotations\Pages;

use App\Filament\Resources\ProjectServiceQuotations\ProjectServiceQuotationResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectServiceQuotations extends ListRecords
{
    protected static string $resource = ProjectServiceQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
