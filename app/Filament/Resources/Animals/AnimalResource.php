<?php

namespace App\Filament\Resources\Animals;

use App\Filament\Resources\Animals\Pages\CreateAnimal;
use App\Filament\Resources\Animals\Pages\EditAnimal;
use App\Filament\Resources\Animals\Pages\ListAnimals;
use App\Filament\Resources\Animals\Schemas\AnimalForm;
use App\Filament\Resources\Animals\Tables\AnimalsTable;
use App\Models\Animal;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use BackedEnum;
use UnitEnum;

class AnimalResource extends Resource
{
    protected static ?string $model = Animal::class;

    protected static BackedEnum|string|null $navigationIcon = 'fas-shield-cat';

    protected static ?string $navigationLabel = 'Animali';

    protected static ?string $modelLabel = 'Animale';

    protected static ?string $pluralModelLabel = 'Animali';

    protected static UnitEnum|string|null $navigationGroup = 'Database';

    public static function form(Schema $schema): Schema
    {
        return AnimalForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnimalsTable::configure($table);
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
            'index' => ListAnimals::route('/'),
            'create' => CreateAnimal::route('/create'),
            'edit' => EditAnimal::route('/{record}/edit'),
        ];
    }
}
