<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BearingSeeder extends Seeder
{
    protected $bearings = [
        [
            'title' => '206'
        ],
        [
            'title' => '306'
        ],
        [
            'title' => '307'
        ],
        [
            'title' => '308'
        ],
        [
            'title' => '309'
        ],
        [
            'title' => '310'
        ],
        [
            'title' => '311'
        ],
        [
            'title' => '312'
        ],
        [
            'title' => '212'
        ],
        [
            'title' => '1604'
        ],
        [
            'title' => '2304'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bearings')->insert($this->bearings);
    }
}
