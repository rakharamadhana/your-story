<?php

namespace Database\Seeders;

use App\Models\Cases;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Cases::create([
            'name_en' => 'Case 1',
            'name_zh-TW' => '案例一',
            'description_en' => $faker->realText(2000),
            'description_zh-TW' => $faker->realText(2000),
            'observes_en' => $faker->realText(100),
            'observes_zh-TW' => $faker->realText(100),
            'perceives_en' => $faker->realText(100),
            'perceives_zh-TW' => $faker->realText(100),
            'needs_en' => $faker->realText(100),
            'needs_zh-TW' => $faker->realText(100),
            'request_en' => $faker->realText(100),
            'request_zh-TW' => $faker->realText(100),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Cases::create([
            'name_en' => 'Case 2',
            'name_zh-TW' => '案例二',
            'description_en' => $faker->realText(2000),
            'description_zh-TW' => $faker->realText(2000),
            'observes_en' => $faker->realText(100),
            'observes_zh-TW' => $faker->realText(100),
            'perceives_en' => $faker->realText(100),
            'perceives_zh-TW' => $faker->realText(100),
            'needs_en' => $faker->realText(100),
            'needs_zh-TW' => $faker->realText(100),
            'request_en' => $faker->realText(100),
            'request_zh-TW' => $faker->realText(100),
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);
    }
}
