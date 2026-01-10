<?php

namespace Database\Seeders;

use App\Models\Species;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $species = [
            ['name' => 'Cani', 'icon' => 'fas-dog', 'sort_order' => 1],
            ['name' => 'Gatti', 'icon' => 'fas-cat', 'sort_order' => 2],
            ['name' => 'Cavalli', 'icon' => 'fas-horse', 'sort_order' => 3],
            ['name' => 'Uccelli', 'icon' => 'fas-dove', 'sort_order' => 4],
            ['name' => 'Rettili', 'icon' => 'fas-snake', 'sort_order' => 5],
            ['name' => 'Piccoli Mammiferi', 'icon' => 'fas-otter', 'sort_order' => 6],
            ['name' => 'Animali da Fattoria', 'icon' => 'fas-cow', 'sort_order' => 7],
            ['name' => 'Esotici', 'icon' => 'fas-dragon', 'sort_order' => 8],
        ];

        foreach ($species as $item) {
            Species::updateOrCreate(
                ['name' => $item['name']],
                [
                    'slug' => Str::slug($item['name']),
                    'icon' => $item['icon'],
                    'sort_order' => $item['sort_order'],
                ]
            );
        }
    }
}
