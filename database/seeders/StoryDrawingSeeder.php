<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Models\Story;
use App\Models\StoryDrawing;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class StoryDrawingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        StoryDrawing::create([
            'story_id' => Story::find(1)->id,
            'title' => 'Page 1',
            'drawing' => $faker->image(storage_path('app/public/drawings'),400,300, null, false) ,
            'description' => $faker->realText(150),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        StoryDrawing::create([
            'story_id' => Story::find(1)->id,
            'title' => 'Page 2',
            'drawing' => $faker->image(storage_path('app/public/drawings'),400,300, null, false) ,
            'description' => $faker->realText(150),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);
    }
}
