<?php

namespace App\Filament\Resources\CastSources\Pages;

use App\Filament\Resources\CastSources\CastSourceResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCastSource extends EditRecord
{
    protected static string $resource = CastSourceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
