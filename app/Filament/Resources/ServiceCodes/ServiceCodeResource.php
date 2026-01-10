<?php

namespace App\Filament\Resources\ServiceCodes;

use App\Filament\Resources\ServiceCodes\Pages\CreateServiceCode;
use App\Filament\Resources\ServiceCodes\Pages\EditServiceCode;
use App\Filament\Resources\ServiceCodes\Pages\ListServiceCodes;
use App\Filament\Resources\ServiceCodes\Schemas\ServiceCodeForm;
use App\Filament\Resources\ServiceCodes\Tables\ServiceCodesTable;
use App\Models\ServiceCode;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ServiceCodeResource extends Resource
{
    protected static ?string $model = ServiceCode::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ServiceCodeForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServiceCodesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListServiceCodes::route('/'),
            'create' => CreateServiceCode::route('/create'),
            'edit' => EditServiceCode::route('/{record}/edit'),
        ];
    }
}
