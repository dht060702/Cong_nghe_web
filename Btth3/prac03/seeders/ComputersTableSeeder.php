<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComputersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word . '-' . $faker->randomNumber(3), // VD: Lab1-345
                'model' => $faker->randomElement(['Dell Optiplex 7090', 'HP EliteBook', 'Lenovo ThinkPad']),
                'operating_system' => $faker->randomElement(['Windows 10 Pro', 'Ubuntu 20.04', 'macOS Ventura']),
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'AMD Ryzen 5 5600X']),
                'memory' => $faker->randomElement([8, 16, 32]), // RAM GB
                'available' => $faker->boolean(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
