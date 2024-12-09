<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class MedicinesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            DB::table('medicines')->insert([
                'name' => $faker->word(),
                'brand' => $faker->company(),
                'form' => $faker->randomElement(['tablet', 'capsule', 'syrup']),
                'dosage' => $faker->randomElement(['100mg', '200mg', '500mg']),
                'price' => $faker->numberBetween(10, 100),
                'stock' => $faker->numberBetween(50, 500),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
