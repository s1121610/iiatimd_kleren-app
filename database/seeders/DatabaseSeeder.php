<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        for ($i = 0; $i < 6; $i++) {
            DB::table('clothes')->insert([
                'name' => "kledingstuk" . $i,
                'spiecies' => Str::random(10),
                'season' => 'all',
                'occasion' => Str::random(5)
            ]);
        }
    }
}
