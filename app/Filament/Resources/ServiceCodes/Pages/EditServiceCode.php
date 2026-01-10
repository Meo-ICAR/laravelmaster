<?php

namespace App\Filament\Resources\ServiceCodes\Pages;

use App\Filament\Resources\ServiceCodes\ServiceCodeResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditServiceCode extends EditRecord
{
    protected static string $resource = ServiceCodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
