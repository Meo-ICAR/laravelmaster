<?php

namespace App\Filament\Resources\ProjectRoleAnimals\Pages;

use App\Filament\Resources\ProjectRoleAnimals\ProjectRoleAnimalResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectRoleAnimals extends ListRecords
{
    protected static string $resource = ProjectRoleAnimalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
