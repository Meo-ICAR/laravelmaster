<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'name' => 'superadmin', 'slug' => 'superadmin', 'company_id' => null],
            ['id' => 3, 'name' => 'admin', 'slug' => 'admin', 'company_id' => null],
            ['id' => 4, 'name' => 'accademy', 'slug' => 'accademy', 'company_id' => null],
            ['id' => 5, 'name' => 'director', 'slug' => 'director', 'company_id' => null],
            ['id' => 7, 'name' => 'actor', 'slug' => 'actor', 'company_id' => null],
            ['id' => 8, 'name' => 'worforcer', 'slug' => 'worforcer', 'company_id' => null],
            ['id' => 9, 'name' => 'renter', 'slug' => 'renter', 'company_id' => null],
        ];

        foreach ($data as $item) {
            Role::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
