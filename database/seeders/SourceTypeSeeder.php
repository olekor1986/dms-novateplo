<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SourceTypeSeeder extends Seeder
{
    protected $source_types = [
        [
            'title' => 'Boiler Room'
        ],
        [
            'title' => 'Heat Exchanger Room'
        ],
        [
            'title' => 'Heating Unit'
        ],
        [
            'title' => 'Building'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('source_types')->insert($this->source_types);
    }
}
