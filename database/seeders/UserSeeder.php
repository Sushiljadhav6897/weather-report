<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Models\users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=> 1,
            'name' => "sushil Jadhav",
            'email' => 'sushiljadhav6897@gmail.com',
            'password' => Crypt::encryptString('sushil@123'),
            'created_at'=> now(),
            'updated_at'=> now(),
        ]);  
    }
}
