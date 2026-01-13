<?php

namespace App\Filament\Resources\ProjectLocationOffers\Pages;

use App\Filament\Resources\ProjectLocationOffers\ProjectLocationOfferResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectLocationOffer extends EditRecord
{
    protected static string $resource = ProjectLocationOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
