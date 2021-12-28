<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Models\Group;
use App\Models\StudentGroup;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudentGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StudentGroup::create([
            'user_id' => User::find(3)->id,
            'group_id' => Group::find(1)->id,
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

        StudentGroup::create([
            'user_id' => User::find(4)->id,
            'group_id' => Group::find(1)->id,
            'created_at' => Carbon::now('Asia/Taipei')->subHours(1),
            'updated_at' => Carbon::now('Asia/Taipei')->subHours(1)
        ]);

    }
}
