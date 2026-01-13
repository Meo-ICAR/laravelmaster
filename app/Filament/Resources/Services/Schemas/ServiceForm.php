<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informazioni Base')
                    ->schema([
                        Grid::make(2)->schema([
                            // In your ServiceForm
                            TextInput::make('name')
                                ->label('Nome Azienda/Persona')
                                ->required()
                                ->maxLength(255)
                                ->columnSpan(2)
                                ->placeholder('Es: "Catering Roma" o "Mario Rossi - Parrucchiere"'),
                            Textarea::make('description')
                                ->label('Descrizione')
                                ->rows(4)
                                ->columnSpanFull()
                                ->placeholder('Descrizione del servizio offerto, specializzazioni, esperienza...')
                                ->helperText('Informazioni pubbliche sul servizio'),
                            Select::make('serviceCodes')
                                ->label('Servizi offerti')
                                ->relationship('serviceCodes', 'name')
                                ->multiple()
                                ->preload()
                                ->columnSpanFull()
                                ->searchable(),
                            Textarea::make('storage')
                                ->label('Disponibilità Magazzino/Archivio')
                                ->rows(4)
                                ->columnSpanFull()
                                ->placeholder('Descrizione della disponibilità magazzino/archivio...')
                                ->helperText('Informazioni sulla disponibilità magazzino/archivio'),
                            Textarea::make('transport')
                                ->label('Mezzi di Trasporto')
                                ->rows(4)
                                ->columnSpanFull()
                                ->placeholder('Descrizione dei mezzi di trasporto disponibili...')
                                ->helperText('Informazioni sui mezzi di trasporto'),
                        ]),
                    ]),
                Section::make('Contatti')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('contact_name')
                                ->label('Nome Contatto')
                                ->maxLength(255)
                                ->placeholder('Nome del contatto principale'),
                            TextInput::make('mobile')
                                ->label('Cellulare')
                                ->tel()
                                ->maxLength(20)
                                ->placeholder('+39 333 1234567'),
                            TextInput::make('city')
                                ->label('Città')
                                ->maxLength(255)
                                ->required(),
                            TextInput::make('travel_km')
                                ->label('Raggio di intervento (km)')
                                ->numeric()
                                ->minValue(0)
                                ->maxValue(1000)
                                ->suffix('km'),
                            TextInput::make('website')
                                ->label('Sito Web')
                                ->url()
                                ->maxLength(255)
                                ->placeholder('https://www.example.com')
                                ->prefix('https://'),
                            TextInput::make('email')
                                ->label('Email')
                                ->email()
                                ->maxLength(255)
                                ->placeholder('email@example.com'),
                            Textarea::make('notes')
                                ->label('Note Interne')
                                ->rows(3)
                                ->columnSpanFull()
                                ->placeholder('Note private per il team di produzione')
                                ->helperText('Note visibili solo agli amministratori'),
                        ]),
                    ]),
            ]);
    }
}
