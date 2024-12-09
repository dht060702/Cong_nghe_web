<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Carbon\Carbon;

class SalesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lấy danh sách ID của các thuốc
        $medicineIds = DB::table('medicines')->pluck('id');

        foreach (range(1, 20) as $index) {
            DB::table('sales')->insert([
                'medicine_id' => $faker->randomElement($medicineIds),
                'quantity' => $faker->numberBetween(1, 50),
                'sale_date' => $faker->dateTimeThisYear(),
                'customer_phone' => $faker->phoneNumber(),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
