<?php

namespace Database\Seeders;

use App\Models\Species;
use App\Models\AnimalBreed;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnimalBreedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $breeds = [
            'Cani' => [
                'Pastore Tedesco',
                'Labrador Retriever',
                'Golden Retriever',
                'Bulldog Francese',
                'Chihuahua',
                'Barboncino',
                'Bassotto',
                'Border Collie',
                'Jack Russell Terrier',
                'Rottweiler',
                'Meticcio',
            ],
            'Gatti' => [
                'Persiano',
                'Siamese',
                'Maine Coon',
                'Bengala',
                'Ragdoll',
                'Certosino',
                'Sphynx',
                'Europeo',
            ],
            'Cavalli' => [
                'Arabo',
                'Frisone',
                'Purosangue Inglese',
                'Quarter Horse',
                'Andaluso',
                'Appaloosa',
            ],
        ];

        foreach ($breeds as $speciesName => $breedList) {
            $species = Species::where('name', $speciesName)->first();

            if ($species) {
                foreach ($breedList as $breedName) {
                    AnimalBreed::updateOrCreate(
                        [
                            'species_id' => $species->id,
                            'name' => $breedName
                        ],
                        [
                            'slug' => Str::slug($breedName . '-' . $species->slug),
                        ]
                    );
                }
            }
        }
    }
}
