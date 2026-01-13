<?php

namespace App\Filament\Resources\ProjectLocationOffers;

use App\Filament\Resources\ProjectLocationOffers\Pages\CreateProjectLocationOffer;
use App\Filament\Resources\ProjectLocationOffers\Pages\EditProjectLocationOffer;
use App\Filament\Resources\ProjectLocationOffers\Pages\ListProjectLocationOffers;
use App\Filament\Resources\ProjectLocationOffers\Pages\ViewProjectLocationOffer;
use App\Filament\Resources\ProjectLocationOffers\Schemas\ProjectLocationOfferForm;
use App\Filament\Resources\ProjectLocationOffers\Schemas\ProjectLocationOfferInfolist;
use App\Filament\Resources\ProjectLocationOffers\Tables\ProjectLocationOffersTable;
use App\Models\ProjectLocationOffer;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectLocationOfferResource extends Resource
{
    protected static ?string $model = ProjectLocationOffer::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProjectLocationOfferForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectLocationOfferInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectLocationOffersTable::configure($table);
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
            'index' => ListProjectLocationOffers::route('/'),
            'create' => CreateProjectLocationOffer::route('/create'),
            'view' => ViewProjectLocationOffer::route('/{record}'),
            'edit' => EditProjectLocationOffer::route('/{record}/edit'),
        ];
    }
}
