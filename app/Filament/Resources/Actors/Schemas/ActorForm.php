<?php

namespace App\Filament\Resources\Actors\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Carbon;
use BackedEnum;
use UnitEnum;

class ActorForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Tabs::make('Attore')
                    ->tabs([
                        // --- SCHEDA 1: Dati Generali ---
                        Tab::make('Anagrafica & Base')
                            ->icon('heroicon-o-user')
                            ->schema([
                                Grid::make(2)->schema([
                                    // Colleghiamo l'utente
                                    Select::make('user_id')
                                        ->relationship('user', 'name')
                                        ->required()
                                        ->searchable()
                                        ->label('Utente Collegato')
                                        ->preload()
                                        ->createOptionForm([
                                            TextInput::make('name')
                                                ->required()
                                                ->maxLength(255),
                                            TextInput::make('email')
                                                ->email()
                                                ->required()
                                                ->maxLength(255)
                                                ->unique(),
                                            TextInput::make('password')
                                                ->password()
                                                ->required()
                                                ->confirmed()
                                                ->maxLength(255),
                                            TextInput::make('password_confirmation')
                                                ->password()
                                                ->required()
                                                ->dehydrated(false),
                                        ]),
                                    TextInput::make('stage_name')
                                        ->label("Nome D'Arte")
                                        ->placeholder('Lascia vuoto se usi il tuo nome reale')
                                        ->maxLength(255),
                                    DatePicker::make('birth_date')
                                        ->label('Data di Nascita')
                                        ->native(false)
                                        ->displayFormat('d/m/Y')
                                        ->required()
                                        ->maxDate(now()),
                                    Select::make('gender')
                                        ->label('Genere (per casting)')
                                        ->options([
                                            'male' => 'Uomo',
                                            'female' => 'Donna',
                                            'non_binary' => 'Non-Binary',
                                        ])
                                        ->required(),
                                ]),
                                Section::make('Localizzazione')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('city')
                                            ->label('Città Residenza')
                                            ->required(),
                                        TextInput::make('province')
                                            ->label('Provincia (Sigla)')
                                            ->maxLength(2),
                                        TextInput::make('country')
                                            ->label('Nazione')
                                            ->default('IT')
                                            ->required(),
                                        TextInput::make('phone')
                                            ->label('Telefono (WhatsApp)')
                                            ->tel()
                                            ->maxLength(20)
                                            ->helperText('Inserisci il numero con prefisso internazionale (es. +39 123 456 7890)'),
                                    ]),
                                // Toggle per visibilità e agenzia
                                Section::make('Stato')
                                    ->schema([
                                        Toggle::make('is_visible')
                                            ->label('Visibile nel Casting')
                                            ->default(true)
                                            ->inline(false),
                                        Select::make('scene_nudo')
                                            ->label('Disponibilità Scene di Nudo')
                                            ->options([
                                                'no' => 'No',
                                                'parziale' => 'Parziale',
                                                'si' => 'Sì',
                                            ])
                                            ->default('no')
                                            ->required(),
                                        Toggle::make('consenso_privacy')
                                            ->label('Consenso al trattamento dei dati personali')
                                            ->required()
                                            ->inline(false),
                                        Toggle::make('is_represented')
                                            ->label('Rappresentato da agenzia')
                                            ->reactive(),
                                        TextInput::make('agency_name')
                                            ->label('Nome Agenzia')
                                            ->visible(fn(callable $get) => $get('is_represented'))
                                            ->maxLength(255),
                                    ]),
                            ]),
                        // --- SCHEDA 2: Caratteristiche Fisiche ---
                        Tab::make('Aspetto Fisico')
                            ->icon('heroicon-o-face-smile')
                            ->schema([
                                Section::make('Dati Base')
                                    ->columns(2)
                                    ->schema([
                                        TextInput::make('height_cm')
                                            ->label('Altezza (cm)')
                                            ->numeric()
                                            ->minValue(50)
                                            ->maxValue(250)
                                            ->required(),
                                        TextInput::make('weight_kg')
                                            ->label('Peso (kg)')
                                            ->numeric()
                                            ->minValue(20)
                                            ->maxValue(300),
                                    ]),
                                Section::make('Dettagli Aspetto')
                                    ->description('Questi dati vengono salvati nel campo JSON "appearance".')
                                    ->columns(3)
                                    ->schema([
                                        Select::make('appearance.eyes')
                                            ->label('Colore Occhi')
                                            ->options([
                                                'blue' => 'Azzurri',
                                                'green' => 'Verdi',
                                                'brown' => 'Castani',
                                                'black' => 'Neri',
                                                'hazel' => 'Nocciola'
                                            ]),
                                        Select::make('appearance.hair_color')
                                            ->label('Colore Capelli')
                                            ->options([
                                                'blonde' => 'Biondi',
                                                'brown' => 'Castani',
                                                'black' => 'Neri',
                                                'red' => 'Rossi',
                                                'grey' => 'Grigi'
                                            ]),
                                        Select::make('appearance.skin')
                                            ->label('Carnagione')
                                            ->options([
                                                'fair' => 'Chiara',
                                                'medium' => 'Media',
                                                'olive' => 'Olivastra',
                                                'dark' => 'Scura'
                                            ]),
                                        Select::make('appearance.ethnicity')
                                            ->label('Etnia Scenica')
                                            ->searchable()
                                            ->options([
                                                'caucasian' => 'Caucasica',
                                                'mediterranean' => 'Mediterranea',
                                                'african' => 'Africana',
                                                'asian' => 'Asiatica',
                                                'hispanic' => 'Ispanica'
                                            ]),
                                        Toggle::make('appearance.has_tattoos')
                                            ->label('Ha Tatuaggi visibili?'),
                                    ]),
                            ]),
                        // --- SCHEDA 3: Skills e Misure ---
                        Tab::make('Skills & Misure')
                            ->icon('heroicon-o-sparkles')
                            ->schema([
                                Section::make('Capacità')
                                    ->schema([
                                        TagsInput::make('capabilities.languages')
                                            ->label('Lingue Parlate')
                                            ->placeholder('Scrivi e premi invio (es. Inglese, Spagnolo)')
                                            ->suggestions([
                                                'Italiano', 'Inglese', 'Francese',
                                                'Spagnolo', 'Tedesco', 'Russo', 'Cinese'
                                            ]),
                                        TagsInput::make('capabilities.skills')
                                            ->label('Skills Specifiche')
                                            ->placeholder('Es. Equitazione, Scherma, Canto Lirico')
                                            ->separator(','),
                                        TagsInput::make('capabilities.driving_license')
                                            ->label('Patenti')
                                            ->suggestions(['AM', 'A1', 'A', 'B', 'C', 'D', 'Nautica']),
                                    ]),
                                Section::make('Misure Sartoriali')
                                    ->columns(4)
                                    ->schema([
                                        TextInput::make('measurements.shoes')
                                            ->label('Scarpe (EU)')
                                            ->numeric()
                                            ->minValue(30)
                                            ->maxValue(55),
                                        TextInput::make('measurements.jacket')
                                            ->label('Giacca/Taglia')
                                            ->numeric()
                                            ->minValue(30)
                                            ->maxValue(70),
                                        TextInput::make('measurements.chest')
                                            ->label('Torace/Seno (cm)')
                                            ->numeric()
                                            ->minValue(50)
                                            ->maxValue(150),
                                        TextInput::make('measurements.waist')
                                            ->label('Vita (cm)')
                                            ->numeric()
                                            ->minValue(40)
                                            ->maxValue(150),
                                        TextInput::make('measurements.hips')
                                            ->label('Fianchi (cm)')
                                            ->numeric()
                                            ->minValue(50)
                                            ->maxValue(150),
                                    ]),
                            ]),
                        // --- SCHEDA 4: Social e Contatti ---
                        Tab::make('Social & Link')
                            ->icon('heroicon-o-link')
                            ->schema([
                                Section::make('Link Esterni')
                                    ->schema([
                                        TextInput::make('socials.instagram')
                                            ->label('Link Instagram')
                                            ->url()
                                            ->prefix('https://instagram.com/'),
                                        TextInput::make('socials.imdb')
                                            ->label('Link IMDb')
                                            ->url()
                                            ->prefix('https://www.imdb.com/name/'),
                                        TextInput::make('socials.website')
                                            ->label('Sito Web Personale')
                                            ->url()
                                            ->prefix('https://'),
                                    ])
                            ]),
                        // --- SCHEDA 5: Media & Showreel ---
                        Tab::make('Media & Showreel')
                            ->icon('heroicon-o-film')
                            ->schema([
                                Section::make('Materiale Fotografico')
                                    ->description('Carica le tue foto migliori (Headshots). La prima sarà la foto profilo.')
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('headshots')
                                            ->label('Headshots / Book')
                                            ->collection('headshots')
                                            ->image()
                                            ->imageEditor()
                                            ->multiple()
                                            ->reorderable()
                                            ->maxFiles(10)
                                            ->columnSpanFull(),
                                    ]),
                                Section::make('Video & Showreel')
                                    ->description('Carica i tuoi showreel o selftape (Max 50MB a video).')
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('showreels')
                                            ->label('Showreel Video')
                                            ->collection('showreels')
                                            ->acceptedFileTypes(['video/mp4', 'video/quicktime'])
                                            ->maxSize(51200)  // 50MB
                                            ->multiple()
                                            ->maxFiles(3)
                                            ->columnSpanFull(),
                                    ]),
                                Section::make('Documenti')
                                    ->description('Carica il tuo curriculum vitae in formato PDF.')
                                    ->schema([
                                        SpatieMediaLibraryFileUpload::make('cv')
                                            ->label('Curriculum Vitae (PDF)')
                                            ->collection('cv')
                                            ->acceptedFileTypes(['application/pdf'])
                                            ->maxSize(2048)  // 2MB
                                            ->downloadable()
                                            ->openable()
                                            ->hint('Massimo 2MB, solo PDF')
                                            ->columnSpanFull(),
                                    ]),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
