<?php

namespace App\Filament\Resources\ProjectRoleActors\Pages;

use App\Filament\Resources\ProjectRoleActors\ProjectRoleActorResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewProjectRoleActor extends ViewRecord
{
    protected static string $resource = ProjectRoleActorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
