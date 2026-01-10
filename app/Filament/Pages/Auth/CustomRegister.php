<?php

namespace App\Filament\Pages\Auth;

use App\Models\Company;
use App\Models\Role;
use App\Models\User;
use Filament\Auth\Pages\Register;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema as LaravelSchema;
use Illuminate\Support\HtmlString;

class CustomRegister extends Register
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                $this->getNameFormComponent(),
                $this->getEmailFormComponent(),
                $this->getPasswordFormComponent(),
                $this->getPasswordConfirmationFormComponent(),
                Select::make('role')
                    ->label('Tipo di Profilo')
                    ->options([
                        'actor' => 'Attore',
                        'servicer' => 'Fornitore di Servizi',
                        'locationer' => 'Proprietario di Location',
                        'company' => 'Società di casting',
                        'accademy' => 'Scuola di Recitazione',
                        'director' => 'Casting Director',
                    ])
                    ->default('actor')
                    ->required()
                    ->live(),

                /*
                 * // Campi specifici per Company
                 * TextInput::make('company_name')
                 *     ->label('Nome Azienda')
                 *     ->required()
                 *     ->visible(fn($get) => $get('role') === 'company'),
                 * TextInput::make('vat_number')
                 *     ->label('Partita IVA')
                 *     ->required()
                 *     ->visible(fn($get) => in_array($get('role'), ['company', 'servicer'])),
                 * // Campi specifici per Servicer
                 * TextInput::make('service_type')
                 *     ->label('Tipo di Servizio')
                 *     ->placeholder('es. Trasporti, Catering, Luci...')
                 *     ->visible(fn($get) => $get('role') === 'servicer'),
                 */
                Section::make('Privacy & Consensi')
                    ->description('Per proseguire è necessario accettare i termini del servizio.')
                    ->schema([
                        Checkbox::make('data_processing_consent')
                            ->label(fn() => new HtmlString('Accetto i <a href="/terms" class="text-primary-600 underline" target="_blank">Termini e Condizioni</a>'))
                            ->required()  // Rende il campo obbligatorio
                            ->rules(['accepted']),
                        Checkbox::make('marketing_consent')
                            ->label(fn() => new HtmlString('Ho letto l\'<a href="/privacy" class="text-primary-600 underline" target="_blank">Informativa Privacy</a>'))
                            ->required()
                            ->rules(['accepted']),
                        Checkbox::make('newsletter_subscription')
                            ->label('Voglio iscrivermi alla newsletter casting (opzionale)'),
                    ]),
            ]);
    }

    protected function handleRegistration(array $data): Model
    {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            // Trova o crea il ruolo
            $role = Role::firstOrCreate(
                ['slug' => $data['role']],
                ['name' => ucfirst($data['role'])]
            );

            $user->roles()->attach($role);

            // Se è una company, creiamo anche l'entità Company
            if ($data['role'] === 'company') {
                $company = Company::create([
                    'name' => $data['company_name'] ?? $data['name'],
                    'email' => $data['email'],
                    'vat_number' => $data['vat_number'] ?? null,
                ]);

                // Colleghiamo l'utente alla company
                if (method_exists($user, 'company')) {
                    $user->update(['company_id' => $company->id]);
                } else if (LaravelSchema::hasColumn('users', 'company_id')) {
                    $user->update(['company_id' => $company->id]);
                }
            }

            return $user;
        });
    }
}
