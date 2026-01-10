<?php

namespace App\Filament\Resources\CastSources;

use App\Filament\Resources\CastSources\Pages\CreateCastSource;
use App\Filament\Resources\CastSources\Pages\EditCastSource;
use App\Filament\Resources\CastSources\Pages\ListCastSources;
use App\Filament\Resources\CastSources\Schemas\CastSourceForm;
use App\Filament\Resources\CastSources\Tables\CastSourcesTable;
use App\Models\CastSource;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class CastSourceResource extends Resource
{
    protected static ?string $model = CastSource::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static UnitEnum|string|null $navigationGroup = 'Sistema';

    public static function form(Schema $schema): Schema
    {
        return CastSourceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return CastSourcesTable::configure($table);
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
            'index' => ListCastSources::route('/'),
            'create' => CreateCastSource::route('/create'),
            'edit' => EditCastSource::route('/{record}/edit'),
        ];
    }
}
