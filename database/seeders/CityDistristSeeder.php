<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CityDistristSeeder extends Seeder
{
    protected $city_districts = [
        [
            'title' => 'Central'
        ],
        [
            'title' => 'South'
        ],
        [
            'title' => 'North'
        ],
        [
            'title' => 'East'
        ],
        [
            'title' => 'West'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('city_districts')->insert($this->city_districts);
    }
}
