<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoilerFuelSeeder extends Seeder
{
    protected $boiler_fuels = [
        [
            'title' => 'Natural Gas'
        ],
        [
            'title' => 'Coal'
        ],
        [
            'title' => 'Electric'
        ],
        [
            'title' => 'Pellet'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boiler_fuels')->insert($this->boiler_fuels);
    }
}
