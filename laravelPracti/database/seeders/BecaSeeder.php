<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BecaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('becas')->insert([ 
            ['tipo'=>"basica",'cantidad'=>"2000",'user_id'=>1],
            ['tipo'=>"minima",'cantidad'=>"3000",'user_id'=>2],
            ['tipo'=>"maxima",'cantidad'=>"86",'user_id'=>3]
        ]);
    }
}
