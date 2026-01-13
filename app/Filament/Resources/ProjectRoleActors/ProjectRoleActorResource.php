<?php

namespace App\Filament\Resources\ProjectRoleActors;

use App\Filament\Resources\ProjectRoleActors\Pages\CreateProjectRoleActor;
use App\Filament\Resources\ProjectRoleActors\Pages\EditProjectRoleActor;
use App\Filament\Resources\ProjectRoleActors\Pages\ListProjectRoleActors;
use App\Filament\Resources\ProjectRoleActors\Pages\ViewProjectRoleActor;
use App\Filament\Resources\ProjectRoleActors\Schemas\ProjectRoleActorForm;
use App\Filament\Resources\ProjectRoleActors\Schemas\ProjectRoleActorInfolist;
use App\Filament\Resources\ProjectRoleActors\Tables\ProjectRoleActorsTable;
use App\Models\ProjectRoleActor;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProjectRoleActorResource extends Resource
{
    protected static ?string $model = ProjectRoleActor::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ProjectRoleActorForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProjectRoleActorInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProjectRoleActorsTable::configure($table);
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
            'index' => ListProjectRoleActors::route('/'),
            'create' => CreateProjectRoleActor::route('/create'),
            'view' => ViewProjectRoleActor::route('/{record}'),
            'edit' => EditProjectRoleActor::route('/{record}/edit'),
        ];
    }
}
