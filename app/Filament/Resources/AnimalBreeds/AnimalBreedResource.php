<?php

namespace App\Filament\Resources\AnimalBreeds;

use App\Filament\Resources\AnimalBreeds\Pages\CreateAnimalBreed;
use App\Filament\Resources\AnimalBreeds\Pages\EditAnimalBreed;
use App\Filament\Resources\AnimalBreeds\Pages\ListAnimalBreeds;
use App\Filament\Resources\AnimalBreeds\Schemas\AnimalBreedForm;
use App\Filament\Resources\AnimalBreeds\Tables\AnimalBreedsTable;
use App\Models\AnimalBreed;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AnimalBreedResource extends Resource
{
    protected static ?string $model = AnimalBreed::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return AnimalBreedForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AnimalBreedsTable::configure($table);
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
            'index' => ListAnimalBreeds::route('/'),
            'create' => CreateAnimalBreed::route('/create'),
            'edit' => EditAnimalBreed::route('/{record}/edit'),
        ];
    }
}
