<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PumpTypeSeeder extends Seeder
{
    protected $pump_types = [
        [
            'title' => 'Main Network'
        ],
        [
            'title' => 'Circulation'
        ],
        [
            'title' => 'Booster'
        ],
        [
            'title' => 'Boiler Circulation'
        ],
        [
            'title' => 'Cold Water'
        ],
        [
            'title' => 'Hot Water'
        ],
        [
            'title' => 'Feed'
        ],
        [
            'title' => 'Drainage'
        ],
        [
            'title' => 'Condensate'
        ],
        [
            'title' => 'Fire-fighting'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pump_types')->insert($this->pump_types);
    }
}
