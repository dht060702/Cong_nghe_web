<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class IssuesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $computerIds = DB::table('computers')->pluck('id'); // Lấy danh sách ID từ bảng computers

        foreach (range(1, 20) as $index) {
            DB::table('issues')->insert([
                'computer_id' => $faker->randomElement($computerIds), // Chọn ngẫu nhiên một máy tính
                'reported_by' => $faker->name,
                'reported_date' => $faker->dateTimeThisMonth(),
                'description' => $faker->text(200), // Mô tả ngắn
                'urgency' => $faker->randomElement(['Low', 'Medium', 'High']),
                'status' => $faker->randomElement(['Open', 'In Progress', 'Resolved']),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
