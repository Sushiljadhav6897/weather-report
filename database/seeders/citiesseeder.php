<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class citiesseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([[
            'id'=> 1,
            'name' => "dubai",
            'longitude' => 55,
            'latitude' => 25,
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'id'=> 2,
            'name' => "abu dhabi",
            'longitude' =>54.366669,
            'latitude' =>24.466667,
            'created_at'=> now(),
            'updated_at'=> now(),  
        ],[
            'id'=> 3,
            'name' => "sharjah",
            'longitude' => 55.40540,
            'latitude' => 25.348766,
            'created_at'=> now(),
            'updated_at'=> now(),
        ]]);   
    }
}
