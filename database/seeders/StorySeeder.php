<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Models\Story;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Story::create([
            'user_id' => User::find(2)->id,
            'name_en' => 'Story 1',
            'name_zh-TW' => '案例一',
            'time' => $faker->realText(100),
            'place' => $faker->realText(100),
            'characters' => $faker->realText(100),
            'conflict' => $faker->realText(100),
            'description' => $faker->realText(2000),
            'nvc_outline' => $faker->realText(1000),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

    }
}
