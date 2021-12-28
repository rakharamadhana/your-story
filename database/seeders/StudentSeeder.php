<?php

namespace Database\Seeders;

use App\Domains\Auth\Models\User;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'user_id' => User::find(2)->id,
            'academic_year' => '110-1',
            'grade' => '7',
            'class' => '1',
            'student_number' => 'M10911810',
        ]);

        Student::create([
            'user_id' => User::find(3)->id,
            'academic_year' => '110-1',
            'grade' => '7',
            'class' => '1',
            'student_number' => 'M10911811',
        ]);

        Student::create([
            'user_id' => User::find(4)->id,
            'academic_year' => '110-1',
            'grade' => '7',
            'class' => '1',
            'student_number' => 'M10911812',
        ]);
    }
}
