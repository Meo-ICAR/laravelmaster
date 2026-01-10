<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'CastingPro') }} - Casting Cinematografico</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>

    <body class="bg-[#0a0a0a] font-sans text-[#EDEDEC] antialiased">
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF4433] selection:text-white">
            <div class="relative w-full max-w-7xl px-6 lg:px-8">
                <header class="flex flex-wrap items-center justify-between py-10">
                    <div class="flex items-center gap-2">
                        <span class="text-2xl font-bold uppercase italic tracking-tight text-white">Casting<span
                                class="text-[#FF4433]">Pro</span></span>
                    </div>

                    <nav class="flex items-center gap-4">
                        @auth
                            <a href="{{ url('/admin') }}"
                                class="rounded-md px-3 py-2 text-sm font-medium text-white ring-1 ring-white/20 transition hover:ring-white/40 focus:outline-none focus-visible:ring-[#FF4433]">
                                Dashboard
                            </a>
                        @else
                            @if (Route::has('filament.admin.auth.login'))
                                <a href="{{ route('filament.admin.auth.login') }}"
                                    class="rounded-md px-3 py-2 text-sm font-medium text-white transition hover:text-[#FF4433] focus:outline-none focus-visible:ring-[#FF4433]">
                                    Log in
                                </a>
                            @endif

                            @if (Route::has('filament.admin.auth.register'))
                                <a href="{{ route('filament.admin.auth.register') }}"
                                    class="rounded-md bg-[#FF4433] px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-[#E63E2E] focus:outline-none focus-visible:ring-[#FF4433]">
                                    Inizia ora
                                </a>
                            @endif
                        @endauth
                    </nav>
                </header>

                <main class="mt-16 lg:mt-32">
                    <div class="grid gap-12 lg:grid-cols-2 lg:items-center">
                        <div class="max-w-xl">
                            <h1 class="text-4xl font-bold tracking-tight text-white sm:text-6xl">
                                Il futuro del <span class="text-[#FF4433]">Casting</span> è qui.
                            </h1>
                            <p class="mt-6 text-lg leading-8 text-[#A1A09A]">
                                La piattaforma PaaS definitiva per le società di produzione e casting. Gestisci attori,
                                talenti, location e fornitori in un unico ecosistema integrato.
                            </p>
                            <div class="mt-10 flex items-center gap-x-6">
                                @if (Route::has('filament.admin.auth.register'))
                                    <a href="{{ route('filament.admin.auth.register') }}"
                                        class="rounded-md bg-[#FF4433] px-6 py-3 text-lg font-semibold text-white shadow-sm hover:bg-[#E63E2E] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#FF4433]">
                                        Crea il tuo account
                                    </a>
                                @endif
                                <a href="{{ route('more-info') }}"
                                    class="text-sm font-semibold leading-6 text-white transition hover:text-[#FF4433]">
                                    Scopri di più <span aria-hidden="true">→</span>
                                </a>
                            </div>
                        </div>

                        <div class="relative lg:ml-10">
                            <div
                                class="flex aspect-[4/3] items-center justify-center overflow-hidden rounded-2xl bg-gradient-to-tr from-[#161615] to-[#2a2a2a] shadow-2xl ring-1 ring-white/10">
                                <div class="grid grid-cols-2 gap-4 p-8 opacity-50">
                                    <div class="h-32 w-full rounded-lg border border-white/10 bg-white/5"></div>
                                    <div class="h-32 w-full rounded-lg border border-[#FF4433]/20 bg-[#FF4433]/10">
                                    </div>
                                    <div class="h-32 w-full rounded-lg border border-white/10 bg-white/5"></div>
                                    <div class="h-32 w-full rounded-lg border border-white/10 bg-white/5"></div>
                                </div>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="h-24 w-24 text-[#FF4433]" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14.5v-9l6 4.5-6 4.5z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="features" class="mt-32 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        <div
                            class="rounded-2xl bg-[#161615] p-8 ring-1 ring-white/10 transition duration-300 hover:ring-[#FF4433]/50">
                            <h3 class="text-lg font-semibold text-white">Talent Management</h3>
                            <p class="mt-4 text-[#A1A09A]">Database completo per profili, attori e animali con gestione
                                multimediale avanzata tramite Spatie MediaLibrary.</p>
                        </div>

                        <div
                            class="rounded-2xl bg-[#161615] p-8 ring-1 ring-white/10 transition duration-300 hover:ring-[#FF4433]/50">
                            <h3 class="text-lg font-semibold text-white">Location & Service</h3>
                            <p class="mt-4 text-[#A1A09A]">Archivia e gestisci location per le riprese e fornitori di
                                servizi in un unico pannello centralizzato.</p>
                        </div>

                        <div
                            class="rounded-2xl bg-[#161615] p-8 ring-1 ring-white/10 transition duration-300 hover:ring-[#FF4433]/50">
                            <h3 class="text-lg font-semibold text-white">Modello PaaS</h3>
                            <p class="mt-4 text-[#A1A09A]">Multi-tenancy nativo per società di produzione con
                                fatturazione integrata tramite Laravel Cashier.</p>
                        </div>
                    </div>
                </main>

                <footer class="mt-32 border-t border-white/10 py-10 text-center text-sm text-[#706f6c]">
                    <p>&copy; {{ date('Y') }} CastingPro. Tutti i diritti riservati. Sviluppato con Laravel 12 &
                        Filament 4.4.</p>
                </footer>
            </div>
        </div>
    </body>

</html>
