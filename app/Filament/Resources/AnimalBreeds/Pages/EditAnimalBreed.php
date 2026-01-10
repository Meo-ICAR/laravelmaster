<?php

namespace App\Filament\Resources\AnimalBreeds\Pages;

use App\Filament\Resources\AnimalBreeds\AnimalBreedResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAnimalBreed extends EditRecord
{
    protected static string $resource = AnimalBreedResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
