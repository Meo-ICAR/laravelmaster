<?php

namespace App\Filament\Resources\Species\RelationManagers;

use App\Filament\Resources\AnimalBreeds\AnimalBreedResource;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class AnimalBreedsRelationManager extends RelationManager
{
    protected static string $relationship = 'animalBreeds';

    protected static ?string $relatedResource = AnimalBreedResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        // $this->getOwnerRecord() è l'istanza di Species
                        $data['species_id'] = $this->getOwnerRecord()->id;

                        return $data;
                    }),
            ])
            ->recordTitleAttribute('name')
            ->columns([
                TextColumn::make('name')
                    ->label('Nome Razza')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('standard_description')
                    ->label('Caratteristiche')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('slug')
                    ->label('URL Slug'),
            ])
            ->headerActions([
                CreateAction::make(),  // Permette di aggiungere una razza al volo
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ]);
    }
}
