<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin BoostCV',
                'email' => 'admin@boostcv.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ],
            [
                'name' => 'Creator BoostCV',
                'email' => 'creator@boostcv.com',
                'password' => Hash::make('password123'),
                'role' => 'creator',
            ],
            [
                'name' => 'Customer BoostCV',
                'email' => 'customer@boostcv.com',
                'password' => Hash::make('password123'),
                'role' => 'customer',
            ],
        ]);
    }
}   