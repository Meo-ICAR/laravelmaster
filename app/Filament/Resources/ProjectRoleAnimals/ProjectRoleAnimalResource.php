<?php

namespace App\Filament\Resources\ProjectRoleAnimals;

use App\Filament\Resources\ProjectRoleAnimals\Pages\CreateProjectRoleAnimal;
use App\Filament\Resources\ProjectRoleAnimals\Pages\EditProjectRoleAnimal;
use App\Filament\Resources\ProjectRoleAnimals\Pages\ListProjectRoleAnimals;
use App\Filament\Resources\ProjectRoleAnimals\Pages\ViewProjectRoleAnimal;
use App\Filament\Resources\ProjectRoleAnimals\Schemas\ProjectRoleAnimalForm;
use App\Filament\Resources\ProjectRoleAnimals\Schemas\ProjectRoleAnimalInfolist;
use App\Filament\Resources\ProjectRoleAnimals\Tables\ProjectRoleAnimalsTable;
use App\Models\ProjectRoleAnimal;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectRoleAnimalResource extends Resource
{
    protected static ?string $model = ProjectRoleAnimal::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function form(Schema $schema): Schema
    {
        return ProjectRoleAnimalForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectRoleAnimalInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectRoleAnimalsTable::configure($table);
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
            'index' => ListProjectRoleAnimals::route('/'),
            'create' => CreateProjectRoleAnimal::route('/create'),
            'view' => ViewProjectRoleAnimal::route('/{record}'),
            'edit' => EditProjectRoleAnimal::route('/{record}/edit'),
        ];
    }
}
