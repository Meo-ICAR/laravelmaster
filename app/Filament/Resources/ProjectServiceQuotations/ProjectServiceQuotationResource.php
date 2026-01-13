<?php

namespace App\Filament\Resources\ProjectServiceQuotations;

use App\Filament\Resources\ProjectServiceQuotations\Pages\CreateProjectServiceQuotation;
use App\Filament\Resources\ProjectServiceQuotations\Pages\EditProjectServiceQuotation;
use App\Filament\Resources\ProjectServiceQuotations\Pages\ListProjectServiceQuotations;
use App\Filament\Resources\ProjectServiceQuotations\Pages\ViewProjectServiceQuotation;
use App\Filament\Resources\ProjectServiceQuotations\Schemas\ProjectServiceQuotationForm;
use App\Filament\Resources\ProjectServiceQuotations\Schemas\ProjectServiceQuotationInfolist;
use App\Filament\Resources\ProjectServiceQuotations\Tables\ProjectServiceQuotationsTable;
use App\Models\ProjectServiceQuotation;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjectServiceQuotationResource extends Resource
{
    protected static ?string $model = ProjectServiceQuotation::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProjectServiceQuotationForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectServiceQuotationInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectServiceQuotationsTable::configure($table);
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
            'index' => ListProjectServiceQuotations::route('/'),
            'create' => CreateProjectServiceQuotation::route('/create'),
            'view' => ViewProjectServiceQuotation::route('/{record}'),
            'edit' => EditProjectServiceQuotation::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
