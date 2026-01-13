<?php

namespace App\Filament\Resources\Actors\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\QueryBuilder\Constraints\DateConstraint;
use Filament\Schemas\Schema;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use BackedEnum;
use UnitEnum;

class ActorsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            // 1. GRIGLIA RESPONSIVE
            ->contentGrid([
                'md' => 2,
                'xl' => 3,
                '2xl' => 4,
            ])
            // 2. LAYOUT CARD
            ->columns([
                Stack::make([
                    // FOTO COPERTINA
                    ImageColumn::make('profile_photo')
                        ->label('')
                        // Usiamo la logica per prendere l'immagine convertita (thumb)
                        ->getStateUsing(fn($record) => $record->getFirstMediaUrl('headshots', 'thumb'))
                        ->height('250px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover w-full rounded-t-xl']),
                    // PANNELLO DATI
                    Panel::make([
                        Stack::make([
                            // Riga 1: Nome (Grande) e Età (Badge)
                            Split::make([
                                TextColumn::make('stage_name')
                                    ->weight('bold')  // Usa stringa semplice
                                    ->size('lg')  // CORRETTO: Usa stringa 'lg' invece della classe
                                    ->searchable(),
                                TextColumn::make('age')
                                    ->formatStateUsing(fn($state) => $state . ' anni')
                                    ->badge()
                                    ->color('gray')
                                    ->alignEnd(),
                            ]),
                            // Riga 2: Altezza e Visibilità
                            Split::make([
                                TextColumn::make('height_cm')
                                    ->formatStateUsing(fn($state) => $state . ' cm')
                                    ->icon('heroicon-m-arrows-up-down')
                                    ->color('gray')
                                    ->size('sm'),  // CORRETTO: Usa stringa 'sm'
                                TextColumn::make('scene_nudo')
                                    ->badge()
                                    ->color(fn(string $state): string => match ($state) {
                                        'no' => 'gray',
                                        'parziale' => 'warning',
                                        'si' => 'success',
                                        default => 'gray',
                                    })
                                    ->formatStateUsing(fn(string $state): string => match ($state) {
                                        'no' => 'No Nudo',
                                        'parziale' => 'Nudo Parziale',
                                        'si' => 'Nudo Completo',
                                        default => $state,
                                    })
                                    ->alignEnd(),
                            ]),
                            // Riga 3: Visibilità e Privacy
                            Split::make([
                                /*
                                 * \Filament\Tables\Columns\TextColumn::make('consenso_privacy')
                                 *     ->formatStateUsing(fn ($state) => $state ? '✅ Consenso Privacy' : '❌ Manca Consenso')
                                 *     ->color(fn ($state) => $state ? 'success' : 'danger')
                                 *     ->size('xs'),
                                 */
                                TextColumn::make('weight_kg')
                                    ->formatStateUsing(fn($state) => $state . ' kg')
                                    ->icon('heroicon-s-scale')
                                    ->color('gray')
                                    ->size('sm'),  // CORRETTO: Usa stringa 'sm'
                                IconColumn::make('is_visible')
                                    ->boolean()
                                    ->label('Visibile')
                                    ->alignEnd(),
                            ]),
                            // Riga 4: Telefono con WhatsApp
                            Split::make([
                                TextColumn::make('phone')
                                    ->label('WhatsApp')
                                    ->color('success')
                                    ->url(fn($record) => $record->getWhatsappUrl('Ciao! Puoi ricontattarci?'))
                                    ->icon('heroicon-o-chat-bubble-oval-left-ellipsis')
                                    ->openUrlInNewTab()
                            ]),
                            // Riga 5: Nome Utente (piccolo)

                            /*
                             * \Filament\Tables\Columns\TextColumn::make('user.name')
                             *     ->prefix('Utente: ')
                             *     ->color('gray')
                             *     ->size('xs'), // CORRETTO: Usa stringa 'xs'
                             */
                        ]),
                    ])->extraAttributes(['class' => 'bg-white p-4 rounded-b-xl border-x border-b border-gray-200 dark:bg-gray-900 dark:border-gray-700']),
                ])->space(0)
            ])
            // 3. I FILTRI (INVARIATI)
            ->filters([
                SelectFilter::make('gender')
                    ->label('Genere')
                    ->options([
                        'male' => 'Uomo',
                        'female' => 'Donna',
                        'non_binary' => 'Non-Binary',
                    ]),
                Filter::make('age_range')
                    ->form([
                        TextInput::make('min_age')
                            ->label('Età minima')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(80),
                        TextInput::make('max_age')
                            ->label('Età massima')
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(100),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_age'],
                                fn(Builder $query, $minAge): Builder => $query->whereDate('birth_date', '<=', now()->subYears($minAge)),
                            )
                            ->when(
                                $data['max_age'],
                                fn(Builder $query, $maxAge): Builder => $query->whereDate('birth_date', '>', now()->subYears($maxAge + 1)),
                            );
                    }),
                Filter::make('height_range')
                    ->form([
                        TextInput::make('min_height')
                            ->label('Altezza minima (cm)')
                            ->numeric()
                            ->minValue(50)
                            ->maxValue(250),
                        TextInput::make('max_height')
                            ->label('Altezza massima (cm)')
                            ->numeric()
                            ->minValue(50)
                            ->maxValue(250),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_height'],
                                fn(Builder $query, $minHeight): Builder => $query->where('height_cm', '>=', $minHeight),
                            )
                            ->when(
                                $data['max_height'],
                                fn(Builder $query, $maxHeight): Builder => $query->where('height_cm', '<=', $maxHeight),
                            );
                    }),
            ])
            // 4. AZIONI (INVARIATE)
            ->actions([
                //    Actions\ViewAction::make(),
                //    Actions\EditAction::make(),
                //   Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                //  Actions\CreateAction::make(),
            ])
            ->striped(false)
            ->defaultSort('created_at', 'desc');
    }
}
