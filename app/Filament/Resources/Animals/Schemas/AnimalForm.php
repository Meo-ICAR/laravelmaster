<?php

namespace App\Filament\Resources\Animals\Schemas;

use App\Models\AnimalBreed;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;

class AnimalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                /*
                 * Select::make('user_id')
                 *     ->relationship('user', 'name'),
                 */
                Select::make('species_id')
                    ->relationship('species', 'name')
                    ->live()
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nome Specie')
                            ->required()
                            ->unique('species', 'name'),  // Sostituisci 'species' con il nome reale della tua tabella
                    ])
                    ->afterStateUpdated(function (Set $set) {
                        // Resetta direttamente il valore del campo 'animal_breed_id'
                        $set('animal_breed_id', null);
                    }),
                Select::make('animal_breed_id')
                    ->label('Breed')
                    ->placeholder(fn(Get $get): string => empty($get('species_id')) ? 'Seleziona prima una specie' : 'Seleziona razza')
                    ->options(function (Get $get) {
                        $speciesId = $get('species_id');

                        if (!$speciesId) {
                            return [];
                        }

                        // Filtra le razze in base alla specie selezionata
                        return AnimalBreed::where('species_id', $speciesId)
                            ->pluck('name', 'id');
                    })
                    ->searchable()
                    ->preload()  // Utile se le razze non sono migliaia
                    ->createOptionForm([
                        TextInput::make('name')
                            ->label('Nome Nuova Razza')
                            ->required(),
                        Hidden::make('species_id')
                            // Usiamo lo stato del form principale per forzare il valore
                            ->default(fn(Get $get) => $get('species_id')),
                    ])
                    ->createOptionUsing(function (array $data, Get $get): int {
                        // Forza il valore se per qualche motivo il form modale lo ha perso
                        if (empty($data['species_id'])) {
                            $data['species_id'] = $get('species_id');
                        }

                        $newBreed = AnimalBreed::create($data);
                        return $newBreed->id;
                    })
                    ->disabled(fn(Get $get): bool => empty($get('species_id'))),  // Disabilita se non c'è una specie
                TextInput::make('name'),
                Select::make('gender')
                    ->options(['male' => 'Male', 'female' => 'Female', 'unknown' => 'Unknown']),
                DatePicker::make('birth_date'),
                TextInput::make('weight')
                    ->numeric(),
                Textarea::make('special_signs')
                    ->columnSpanFull(),
                Textarea::make('bio')
                    ->columnSpanFull(),
                TextInput::make('location'),
                TextInput::make('latitude')
                    ->numeric(),
                TextInput::make('longitude')
                    ->numeric(),
                Toggle::make('is_certified')
                    ->required(),
            ]);
    }
}
