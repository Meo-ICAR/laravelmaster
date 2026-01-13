<?php

namespace App\Filament\Resources\ProjectLocationOffers\Pages;

use App\Filament\Resources\ProjectLocationOffers\ProjectLocationOfferResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectLocationOffers extends ListRecords
{
    protected static string $resource = ProjectLocationOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
