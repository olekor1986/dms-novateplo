<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        \App\Models\Source::factory(100)->create();

        $this->call([
            RoleSeeder::class,
            StaffSeeder::class,
            CityDistristSeeder::class,
            SourceFuelSeeder::class,
            SourceTypeSeeder::class,


        ]);
    }
}
