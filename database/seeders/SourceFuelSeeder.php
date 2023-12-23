<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceFuelSeeder extends Seeder
{
    protected $source_fuels = [
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
        DB::table('source_fuels')->insert($this->source_fuels);
    }
}
