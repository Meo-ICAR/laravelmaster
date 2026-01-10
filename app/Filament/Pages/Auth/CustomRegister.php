<?php

namespace App\Filament\Pages\Auth;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Auth\Pages\Register;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema as LaravelSchema;

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
                        'actor' => 'Attore / Talento',
                        'servicer' => 'Fornitore di Servizi',
                        'locationer' => 'Proprietario di Location',
                        'director' => 'Regista / Casting Director',
                        'company' => 'Società di Produzione',
                    ])
                    ->default('actor')
                    ->required()
                    ->live(),

                // Campi specifici per Company
                TextInput::make('company_name')
                    ->label('Nome Azienda')
                    ->required()
                    ->visible(fn ($get) => $get('role') === 'company'),

                TextInput::make('vat_number')
                    ->label('Partita IVA')
                    ->required()
                    ->visible(fn ($get) => in_array($get('role'), ['company', 'servicer'])),
                
                // Campi specifici per Servicer
                TextInput::make('service_type')
                    ->label('Tipo di Servizio')
                    ->placeholder('es. Trasporti, Catering, Luci...')
                    ->visible(fn ($get) => $get('role') === 'servicer'),
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
