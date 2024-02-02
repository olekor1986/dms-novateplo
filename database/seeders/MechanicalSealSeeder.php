<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MechanicalSealSeeder extends Seeder
{
    protected $mechanical_seals= [
        [
            'title' => 'R-BT-FN 32, CAR/CER, EPDM, 304'
        ],
        [
            'title' => 'R-BT-FN 22, CAR/CER, EPDM, 304'
        ],
        [
            'title' => 'R-BT-FN.NU 22, CAR/CER, EPDM, 304'
        ],
        [
            'title' => 'BR-BT-FN.NU 20, CAR/CER, EPDM, 304'
        ],
        [
            'title' => 'R-MG13 38, CAR/SIC, EPDM, 304, G6'
        ],
        [
            'title' => 'R-MG13 28, CAR/CER, EPDM, 304, G6'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mechanical_seals')->insert($this->mechanical_seals);
    }
}
