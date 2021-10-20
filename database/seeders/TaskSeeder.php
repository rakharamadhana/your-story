<?php

namespace Database\Seeders;

use App\Models\Task;
use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Task::create([
            'name' => 'Task 1',
            'cases_id' => 1,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Task::create([
            'name' => 'Task 2',
            'cases_id' => 1,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Task::create([
            'name' => 'Task 3',
            'cases_id' => 1,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Task::create([
            'name' => 'Task 1',
            'cases_id' => 2,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);

        Task::create([
            'name' => 'Task 2',
            'cases_id' => 2,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);

        Task::create([
            'name' => 'Task 3',
            'cases_id' => 2,
            'type' => $faker->randomElement([Task::TYPE_MULTIPLE_CHOICE,Task::TYPE_ESSAY,Task::TYPE_MIXED]),
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);
    }
}
