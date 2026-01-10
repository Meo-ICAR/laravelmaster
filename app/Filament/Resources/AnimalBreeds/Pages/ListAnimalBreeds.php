<?php

namespace App\Filament\Resources\AnimalBreeds\Pages;

use App\Filament\Resources\AnimalBreeds\AnimalBreedResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAnimalBreeds extends ListRecords
{
    protected static string $resource = AnimalBreedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
