<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BurnerTypeSeeder extends Seeder
{
    protected $burner_types = [
        [
            'title' => 'None'
        ],
        [
            'title' => 'Atmospheric'
        ],
        [
            'title' => 'Infrared'
        ],
        [
            'title' => 'Premix'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('burner_types')->insert($this->burner_types);
    }
}
