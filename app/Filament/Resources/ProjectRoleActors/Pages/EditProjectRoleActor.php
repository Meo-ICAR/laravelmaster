<?php

namespace App\Filament\Resources\ProjectRoleActors\Pages;

use App\Filament\Resources\ProjectRoleActors\ProjectRoleActorResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectRoleActor extends EditRecord
{
    protected static string $resource = ProjectRoleActorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
