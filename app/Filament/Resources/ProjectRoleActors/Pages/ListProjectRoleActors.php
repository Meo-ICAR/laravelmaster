<?php

namespace App\Filament\Resources\ProjectRoleActors\Pages;

use App\Filament\Resources\ProjectRoleActors\ProjectRoleActorResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListProjectRoleActors extends ListRecords
{
    protected static string $resource = ProjectRoleActorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
