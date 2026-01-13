<?php

namespace App\Filament\Resources\ProjectRoleAnimals\Pages;

use App\Filament\Resources\ProjectRoleAnimals\ProjectRoleAnimalResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectRoleAnimal extends EditRecord
{
    protected static string $resource = ProjectRoleAnimalResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
