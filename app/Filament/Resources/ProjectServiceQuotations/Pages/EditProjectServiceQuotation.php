<?php

namespace App\Filament\Resources\ProjectServiceQuotations\Pages;

use App\Filament\Resources\ProjectServiceQuotations\ProjectServiceQuotationResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditProjectServiceQuotation extends EditRecord
{
    protected static string $resource = ProjectServiceQuotationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
