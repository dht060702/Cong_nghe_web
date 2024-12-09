<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $classIds = DB::table('classes')->pluck('id'); // Lấy danh sách ID từ bảng classes

        foreach (range(1, 20) as $index) {
            DB::table('students')->insert([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'date_of_birth' => $faker->dateTimeBetween('-10 years', '-4 years')->format('Y-m-d'), // Trẻ từ 4-10 tuổi
                'parent_phone' => $faker->phoneNumber,
                'class_id' => $faker->randomElement($classIds), // Chọn ngẫu nhiên một lớp
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
