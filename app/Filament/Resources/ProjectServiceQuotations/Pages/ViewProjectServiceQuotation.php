<?php

namespace App\Filament\Resources\ProjectServiceQuotations\Pages;

use App\Filament\Resources\ProjectServiceQuotations\ProjectServiceQuotationResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectServiceQuotation extends ViewRecord
{
    protected static string $resource = ProjectServiceQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
