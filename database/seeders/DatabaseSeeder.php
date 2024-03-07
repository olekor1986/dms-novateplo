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

        \App\Models\Boiler::factory(400)->create();

        \App\Models\Pump::factory(800)->create();

        \App\Models\HeatingPipeline::factory(2000)->create();

        $this->call([
            RoleSeeder::class,
            StaffSeeder::class,
            CityDistristSeeder::class,
            BoilerFuelSeeder::class,
            SourceTypeSeeder::class,
            BurnerTypeSeeder::class,
            PumpTypeSeeder::class,
            MechanicalSealSeeder::class,
            BearingSeeder::class,


        ]);
    }
}
