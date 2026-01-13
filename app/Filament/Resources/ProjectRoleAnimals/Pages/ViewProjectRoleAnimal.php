<?php

namespace App\Filament\Resources\ProjectRoleAnimals\Pages;

use App\Filament\Resources\ProjectRoleAnimals\ProjectRoleAnimalResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectRoleAnimal extends ViewRecord
{
    protected static string $resource = ProjectRoleAnimalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
