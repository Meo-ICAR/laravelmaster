<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'CastingPro') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @filamentStyles
            @filamentScripts
        @else
            <style>
                /* Base styles */
                *,
                ::before,
                ::after {
                    box-sizing: border-box;
                    border-width: 0;
                    border-style: solid;
                    border-color: #e5e7eb;
                }

                html {
                    line-height: 1.5;
                    -webkit-text-size-adjust: 100%;
                    -moz-tab-size: 4;
                    tab-size: 4;
                    font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
                }

                body {
                    margin: 0;
                    line-height: inherit;
                }

                /* Utility classes */
                .flex {
                    display: flex;
                }

                .hidden {
                    display: none;
                }

                .items-center {
                    align-items: center;
                }

                .justify-between {
                    justify-content: space-between;
                }

                .space-x-2> :not([hidden])~ :not([hidden]) {
                    margin-left: 0.5rem;
                }

                .space-x-4> :not([hidden])~ :not([hidden]) {
                    margin-left: 1rem;
                }

                .w-10 {
                    width: 2.5rem;
                }

                .h-10 {
                    height: 2.5rem;
                }

                .rounded-xl {
                    border-radius: 0.75rem;
                }

                .shadow-lg {
                    box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
                }

                .text-white {
                    color: white;
                }

                .text-2xl {
                    font-size: 1.5rem;
                    line-height: 2rem;
                }

                .font-bold {
                    font-weight: 700;
                }

                .bg-gradient-to-r {
                    background-image: linear-gradient(to right, var(--tw-gradient-stops));
                }

                .from-red-500 {
                    --tw-gradient-from: #ef4444;
                    --tw-gradient-to: rgb(239 68 68 / 0);
                    --tw-gradient-stops: var(--tw-gradient-from), var(--tw-gradient-to);
                }

                .to-orange-500 {
                    --tw-gradient-to: #f97316;
                }

                .flex {
                    display: flex;
                }

                .items-center {
                    align-items: center;
                }

                .justify-center {
                    justify-content: center;
                }

                .px-6 {
                    padding-left: 1.5rem;
                    padding-right: 1.5rem;
                }

                .py-6 {
                    padding-top: 1.5rem;
                    padding-bottom: 1.5rem;
                }

                .lg\:px-8 {
                    @media (min-width: 1024px) {
                        padding-left: 2rem;
                        padding-right: 2rem;
                    }
                }

                .max-w-7xl {
                    max-width: 80rem;
                }

                .mx-auto {
                    margin-left: auto;
                    margin-right: auto;
                }

                /* Add more utility classes as needed */
            </style>
        @endif
    </head>

    <body
        class="min-h-screen bg-gradient-to-br from-slate-50 to-white text-gray-900 antialiased dark:from-gray-900 dark:to-gray-800 dark:text-gray-100">

        <!-- Navigation -->
        <nav class="mx-auto max-w-7xl px-6 py-6 lg:px-8">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <div
                        class="from-black-500 flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-r to-gray-500 shadow-lg">
                        <span class="text-lg font-bold text-white">🎬</span>
                    </div>
                    <span
                        class="from-black-600 bg-gradient-to-r to-gray-500 bg-clip-text text-2xl font-bold text-black">
                        CastingPro
                    </span>
                </div>

                <div class="flex items-center space-x-4">
                    @auth
                        <a href="{{ url('/admin') }}"
                            class="rounded-xl border border-gray-200/50 bg-white/80 px-6 py-2.5 text-sm font-medium shadow-sm backdrop-blur-sm transition-all duration-200 hover:border-gray-300 hover:bg-white/100 hover:shadow-md">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ url('/admin/login') }}"
                            class="text-sm font-medium text-gray-700 transition-colors hover:text-red-600 dark:text-gray-300 dark:hover:text-red-400">
                            Accedi
                        </a>

                        <a href="{{ url('/admin/register') }}"
                            class="rounded-xl bg-gradient-to-r from-red-500 to-orange-500 px-6 py-2.5 font-medium text-white shadow-lg transition-all duration-200 hover:from-red-600 hover:to-orange-600 hover:shadow-xl">
                            Registrati Gratis
                        </a>

                    @endauth
                </div>

            </div>
        </nav>

        <!-- Hero Section -->
        <section class="mx-auto max-w-7xl px-6 py-20 lg:px-8 lg:py-32">
            <div class="grid items-center gap-12 lg:grid-cols-2 lg:gap-20">

                <!-- Content -->
                <div class="space-y-8 lg:order-1">
                    <div
                        class="inline-flex items-center rounded-full border border-red-200/50 bg-gradient-to-r from-red-100/80 to-orange-100/80 px-4 py-2 text-sm font-semibold text-red-700 backdrop-blur-sm dark:border-red-800/50 dark:from-red-900/30 dark:to-orange-900/30 dark:text-red-300">
                        🎥 La Tua Prossima Audizione Ti Aspetta
                    </div>

                    <h1
                        class="bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-5xl font-bold leading-tight text-transparent lg:text-7xl dark:from-white dark:to-gray-200">
                        CastingPro:<br>
                        <span
                            class="bg-gradient-to-r from-gray-600 via-orange-500 to-yellow-500 bg-clip-text text-transparent">Il
                            Tuo</span><br>
                        Palcoscenico Digitale
                    </h1>

                    <p class="max-w-lg text-xl leading-relaxed text-gray-600 dark:text-gray-300">
                        Connettiamo talenti con registi, casting director e produzioni. Il tuo profilo raggiunge chi
                        conta nel cinema e TV, aumentando le tue possibilità di essere scelto per le prossime
                        produzioni.
                    </p>

                    <div class="grid max-w-lg gap-4 md:grid-cols-2">
                        @if (Route::has('filament.admin.auth.register'))
                            <a href="{{ route('filament.admin.auth.register') }}"
                                class="hover:shadow-3xl group flex items-center justify-center space-x-3 rounded-2xl bg-gradient-to-r from-red-500 to-orange-500 px-8 py-4 text-lg font-semibold text-white shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:from-red-600 hover:to-orange-600">
                                <span>Inizia Ora</span>
                                <svg class="h-6 w-6 transition-transform group-hover:translate-x-1" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        @endif

                        <div class="flex items-center space-x-6 py-4 text-sm text-gray-500 dark:text-gray-400">
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 animate-pulse rounded-full bg-green-400"></div>
                                <span>1.745 Attori Registrati</span>
                            </div>
                            <div class="h-6 w-px bg-gray-200 dark:bg-gray-700"></div>
                            <div class="flex items-center space-x-2">
                                <div class="h-2 w-2 animate-pulse rounded-full bg-blue-400"></div>
                                <span>123+ Produzioni</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hero Carousel -->
                <div class="group relative lg:order-2">
                    <div
                        class="hover:shadow-3xl relative aspect-[4/3] w-full overflow-hidden rounded-3xl shadow-2xl transition-all duration-500 lg:aspect-square">

                        <!-- Carousel Container -->
                        <div class="carousel-container relative h-full w-full" x-data="carousel()"
                            x-init="$nextTick(() => init())">

                            <!-- Slides -->
                            <div class="carousel-slides h-full w-full overflow-hidden">
                                <div class="carousel-track flex transition-transform duration-700 ease-in-out"
                                    :style="`transform: translateX(-${currentIndex * 100}%)`">

                                    <!-- Slide 1: Attore protagonista -->
                                    <div class="carousel-slide relative h-full w-full flex-shrink-0">
                                        <img src="{{ asset('images/slide/attore.png') }}"
                                            alt="Attore protagonista in audizione" class="h-full w-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute bottom-8 left-8 text-white">
                                            <h3 class="mb-2 text-2xl font-bold">Protagonista</h3>
                                            <p class="text-lg opacity-90">Il tuo ruolo principale</p>
                                        </div>
                                    </div>
                                    <!-- Slide 4: Servizi -->
                                    <div class="carousel-slide relative h-full w-full flex-shrink-0">
                                        <img src="{{ asset('images/slide/service.png') }}"
                                            alt="Set cinematografico professionale" class="h-full w-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute bottom-8 left-8 text-white">
                                            <h3 class="mb-2 text-2xl font-bold">Maestranze</h3>
                                            <p class="text-lg opacity-90">Proponi i tuoi servizi al cinema</p>
                                        </div>
                                    </div>
                                    <!-- Slide 3: Set cinematografico -->
                                    <div class="carousel-slide relative h-full w-full flex-shrink-0">
                                        <img src="{{ asset('images/slide/location.png') }}"
                                            alt="Set cinematografico professionale" class="h-full w-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute bottom-8 left-8 text-white">
                                            <h3 class="mb-2 text-2xl font-bold">Location</h3>
                                            <p class="text-lg opacity-90">Per girare film da te</p>
                                        </div>
                                    </div>
                                    <!-- Slide 1b: Animali protagonista -->
                                    <div class="carousel-slide relative h-full w-full flex-shrink-0">
                                        <img src="{{ asset('images/slide/animali.png') }}"
                                            alt="Attore protagonista in audizione" class="h-full w-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute bottom-8 left-8 text-white">
                                            <h3 class="mb-2 text-2xl font-bold">Animali</h3>
                                            <p class="text-lg opacity-90">Casting con animali</p>
                                        </div>
                                    </div>

                                    <!-- Slide 2: Casting Director -->
                                    <div class="carousel-slide relative h-full w-full flex-shrink-0">
                                        <img src="{{ asset('images/slide/casting.png') }}"
                                            alt="Casting director al lavoro" class="h-full w-full object-cover">
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent">
                                        </div>
                                        <div class="absolute bottom-8 left-8 text-white">
                                            <h3 class="mb-2 text-2xl font-bold">Casting Director</h3>
                                            <p class="text-lg opacity-90">Trova il talento perfetto</p>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Indicators -->
                            <div class="absolute bottom-6 left-1/2 flex -translate-x-1/2 transform space-x-2">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button @click="goToSlide(index)"
                                        :class="`w-3 h-3 rounded-full transition-all duration-300 ${currentIndex === index ? 'bg-white scale-125 shadow-lg' : 'bg-white/50 hover:bg-white'}`">
                                    </button>
                                </template>
                            </div>

                            <!-- Navigation Arrows -->
                            <button
                                class="absolute left-4 top-1/2 -translate-y-1/2 rounded-full bg-white/20 p-3 text-white backdrop-blur-sm transition-all duration-300 hover:bg-white/40 hover:text-white"
                                @click="prevSlide()" x-show="currentIndex > 0">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button
                                class="absolute right-4 top-1/2 -translate-y-1/2 rounded-full bg-white/20 p-3 text-white backdrop-blur-sm transition-all duration-300 hover:bg-white/40 hover:text-white"
                                @click="nextSlide()">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>

                        </div>

                    </div>
                </div>

            </div>
        </section>

        <!-- Features Section -->
        <section class="mx-auto max-w-7xl px-6 py-32 lg:px-8">
            <div class="mb-20 text-center">
                <h2
                    class="mb-6 bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-4xl font-bold text-transparent lg:text-5xl dark:from-white dark:to-gray-200">
                    Perché CastingPro?
                </h2>
                <p class="mx-auto max-w-2xl text-xl text-gray-600 dark:text-gray-300">
                    La piattaforma di casting in Italia. Tecnologia avanzata, matching intelligente, risultati
                    garantiti.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-3">
                <div
                    class="group rounded-3xl border border-white/30 bg-white/50 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-white/50 hover:bg-white/70 hover:shadow-2xl dark:bg-gray-800/50 dark:hover:bg-gray-800/70">
                    <div
                        class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-r from-emerald-400 to-teal-500 shadow-xl transition-transform group-hover:scale-110">
                        <span class="text-2xl">🎯</span>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Matching Perfetto</h3>
                    <p class="text-gray-600 dark:text-gray-300">Ricevi solo i casting perfetti per età, esperienza e
                        tipo di ruolo.</p>
                </div>

                <div
                    class="group rounded-3xl border border-white/30 bg-white/50 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-white/50 hover:bg-white/70 hover:shadow-2xl dark:bg-gray-800/50 dark:hover:bg-gray-800/70">
                    <div
                        class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-r from-blue-400 to-indigo-500 shadow-xl transition-transform group-hover:scale-110">
                        <span class="text-2xl">⚡</span>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">Visibilità Immediata</h3>
                    <p class="text-gray-600 dark:text-gray-300">Il tuo profilo è online subito e visibile a tutti i
                        casting director.</p>
                </div>

                <div
                    class="group rounded-3xl border border-white/30 bg-white/50 p-8 text-center backdrop-blur-sm transition-all duration-300 hover:-translate-y-2 hover:border-white/50 hover:bg-white/70 hover:shadow-2xl dark:bg-gray-800/50 dark:hover:bg-gray-800/70">
                    <div
                        class="mx-auto mb-6 flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-r from-purple-400 to-pink-500 shadow-xl transition-transform group-hover:scale-110">
                        <span class="text-2xl">🛡️</span>
                    </div>
                    <h3 class="mb-4 text-2xl font-bold text-gray-900 dark:text-white">100% Sicuro</h3>
                    <p class="text-gray-600 dark:text-gray-300">Protezione dati GDPR, verifiche identità, pagamenti
                        sicuri.</p>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="mx-auto max-w-4xl px-6 py-20 text-center lg:px-8">
            <div class="from-black-500 to-black-500 rounded-3xl bg-gradient-to-r via-gray-500 p-12 shadow-2xl lg:p-20">
                <h2 class="mb-6 text-4xl font-bold leading-tight text-white lg:text-5xl">
                    Pronto per il Tuo<br>
                    <span class="text-6xl">Ruolo?</span>
                </h2>
                <p class="mx-auto mb-10 max-w-2xl text-xl text-white/90">
                    Unisciti ai tanti attori che hanno trovato il loro ruolo perfetto con CastingPro.
                </p>
                @if (Route::has('filament.admin.auth.register'))
                    <a href="{{ route('filament.admin.auth.register') }}"
                        class="hover:shadow-3xl inline-flex items-center rounded-2xl bg-white px-10 py-5 text-xl font-bold text-red-600 shadow-2xl transition-all duration-300 hover:-translate-y-1 hover:bg-gray-50">
                        Crea Profilo Gratis <span class="ml-3">→</span>
                    </a>
                @endif
            </div>
        </section>

        <!-- Admin Access -->
        @if (Route::has('filament.admin.auth.login'))
            <div class="mx-auto max-w-md px-6 pb-12 text-center">
                <div
                    class="rounded-2xl border border-gray-200/50 bg-white/50 p-8 shadow-xl backdrop-blur-sm dark:border-gray-700/50 dark:bg-gray-800/50">
                    <h3 class="mb-4 text-lg font-semibold text-gray-900 dark:text-white">Professionisti del Settore?
                    </h3>
                    <div class="space-y-2">
                        <a href="{{ route('filament.admin.auth.login') }}"
                            class="block w-full rounded-xl border border-red-200 px-4 py-2 font-medium text-red-600 transition-all hover:border-red-300 hover:bg-red-50 hover:text-red-700">
                            Iscriviti gratuitamente come professionista
                        </a>
                    </div>
                </div>
            </div>
        @endif

    </body>
    <!-- Script del Carousel (alla fine del body) -->
    <script>
        function carousel() {
            return {
                currentIndex: 0,
                slides: 4,
                interval: null,
                badges: [{
                        title: '📸 Portfolio Illimitato',
                        subtitle: 'Mostra il meglio di te'
                    },

                    {
                        title: '📸 Ruoli su misura',
                        subtitle: 'Casting perfetti per te'
                    },
                    {
                        title: '🎬 Il set da te',
                        subtitle: 'Ulteriori guadagni'
                    },
                    {
                        title: '🎭 Opportunità',
                        subtitle: 'Valorizza i tuoi servizi'
                    },
                ],

                init() {
                    this.startAutoPlay();
                },

                nextSlide() {
                    this.currentIndex = (this.currentIndex + 1) % this.slides;
                    this.pauseAutoPlay();
                    this.startAutoPlay();
                },

                prevSlide() {
                    this.currentIndex = this.currentIndex === 0 ? this.slides - 1 : this.currentIndex - 1;
                    this.pauseAutoPlay();
                    this.startAutoPlay();
                },

                goToSlide(index) {
                    this.currentIndex = index;
                    this.pauseAutoPlay();
                    this.startAutoPlay();
                },

                startAutoPlay() {
                    this.pauseAutoPlay();
                    this.interval = setInterval(() => {
                        this.nextSlide();
                    }, 5000);
                },

                pauseAutoPlay() {
                    if (this.interval) {
                        clearInterval(this.interval);
                        this.interval = null;
                    }
                }
            }
        }
    </script>

</html>
