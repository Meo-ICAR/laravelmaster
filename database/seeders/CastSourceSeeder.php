<?php

namespace Database\Seeders;

use App\Models\CastSource;
use Illuminate\Database\Seeder;

class CastSourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'id' => 2,
                'name' => 'AttoriCasting Campania',
                'base_url' => 'https://www.attoricasting.it',
                'list_url' => 'https://www.attoricasting.it/casting-regione/campania/',
                'adapter_class' => 'App\Scrapers\Adapters\AttoriCastingAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Film Commission Regione Campania',
                'base_url' => 'https://www.fcrc.it',
                'list_url' => 'https://www.fcrc.it/news/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 4,
                'name' => 'Casting e Provini',
                'base_url' => 'https://www.castingeprovini.com',
                'list_url' => 'https://www.castingeprovini.com/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 5,
                'name' => 'Klab4',
                'base_url' => 'https://www.klab4.it',
                'list_url' => 'https://www.klab4.it/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 6,
                'name' => 'Casting Kids Studios',
                'base_url' => 'https://www.castingkidsstudios.com',
                'list_url' => 'https://www.castingkidsstudios.com/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 7,
                'name' => 'CinemaFiction',
                'base_url' => 'https://www.cinemafiction.com',
                'list_url' => 'https://www.cinemafiction.com/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 8,
                'name' => 'La Vesuviana Management',
                'base_url' => 'https://www.lavesuviana.com',
                'list_url' => 'https://www.lavesuviana.com/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 9,
                'name' => 'Teatro di Napoli',
                'base_url' => 'https://www.teatrodinapoli.it',
                'list_url' => 'https://www.teatrodinapoli.it/news/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 10,
                'name' => 'Fondazione Campania dei Festival',
                'base_url' => 'https://fondazionecampaniadeifestival.it',
                'list_url' => 'https://fondazionecampaniadeifestival.it/bandi-e-avvisi/',
                'adapter_class' => 'App\Scrapers\Adapters\ExampleSiteAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 11,
                'name' => 'Telegram Attoricasting',
                'base_url' => 'https://t.me/attoricasting',
                'list_url' => 'https://t.me/s/attoricasting',
                'adapter_class' => 'App\Scrapers\Adapters\TelegramAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
            [
                'id' => 12,
                'name' => 'Telegram Casting e Provini',
                'base_url' => 'https://t.me/castingeprovini',
                'list_url' => 'https://t.me/s/castingeprovini',
                'adapter_class' => 'App\Scrapers\Adapters\TelegramAdapter',
                'rate_limit_per_minute' => 60,
                'active' => 1,
            ],
        ];
        foreach ($data as $item) {
            CastSource::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
