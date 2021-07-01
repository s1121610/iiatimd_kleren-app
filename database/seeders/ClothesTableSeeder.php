<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClothesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clothe::truncate();
        $tester = \Faker\Factory::create();
        for ($i = 0; $i < 6; $i++) {
            Clothe::create([
                'name' => $tester->name,
                'spiecies' => $tester->sentence,
                'season' => $tester->sentence,
                'occasion' => $tester->sentence,
            ]);
        }
    }
}
