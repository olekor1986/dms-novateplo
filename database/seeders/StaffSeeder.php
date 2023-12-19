<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    protected $staffs = [
        [
            'title' => 'Junior Manager'
        ],
        [
            'title' => 'Middle Manager'
        ],
        [
            'title' => 'Senior Manager'
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staff')->insert($this->staffs);
    }
}
