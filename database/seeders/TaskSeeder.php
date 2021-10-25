<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Task;
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
        Task::create([
            'name_en' => 'Task 1',
            'name_zh-TW' => '任務一',
            'type' => Task::TYPE_TASK_1,
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        Task::create([
            'name_en' => 'Task 2',
            'name_zh-TW' => '任務二',
            'type' => Task::TYPE_TASK_2,
            'created_at' => Carbon::now('Asia/Taipei'),
            'updated_at' => Carbon::now('Asia/Taipei')
        ]);
    }
}
