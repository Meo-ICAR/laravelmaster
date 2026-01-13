<?php

namespace App\Filament\Resources\ProjectLocationOffers\Pages;

use App\Filament\Resources\ProjectLocationOffers\ProjectLocationOfferResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectLocationOffer extends ViewRecord
{
    protected static string $resource = ProjectLocationOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
