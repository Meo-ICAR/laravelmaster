# CastingPro - Casting Cinematografico

Applicazione PaaS per il casting cinematografico sviluppata con **Laravel 12** e **Filament 4.4**.

## Architettura e Modello di Business
- **Modello PaaS**: L'app viene fornita a **Company** (società di produzione/casting).
- **Entità**: Le Company gestiscono e interagiscono con:
    - **Customer**: Clienti finali.
    - **Location**: Spazi e location per riprese.
    - **Service**: Fornitori di servizi.
    - **Profiles**: Attori e talenti.
    - **Animals**: Animali da casting.

## Stack Tecnologico
- **Framework**: Laravel 12
- **Admin Panel**: Filament 4.4
- **Media**: Spatie MediaLibrary (per memorizzare foto e video di profili, animali e location).
- **Pagamenti**: Laravel Cashier (gestito a livello di `Company`).

## Comandi Utili
- **Sviluppo**: `npm run dev` (avvia server, code e vite)
- **Test**: `php artisan test`
- **Linting**: `./vendor/bin/pint`
- **Database**: `php artisan migrate`

## Convenzioni di Codice
- Utilizzare `protected $guarded = []` nei modelli se non specificato diversamente.
- Seguire le convenzioni di Filament per le risorse e i componenti.
- Utilizzare Spatie MediaLibrary per la gestione di tutti i file multimediali.
