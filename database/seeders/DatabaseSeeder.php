<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Classroom;
use App\Models\Curriculum;
use App\Models\CurriculumLecture;
use App\Models\Lecture;
use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Lecture::factory(11)->create();
        Curriculum::factory(10)->create();
        //        CurriculumLecture::create([
        //            'lecture_id' => 1,
        //            'curriculum_'  =>1
        //        ]);
        Classroom::factory(10)->create();
        Student::factory(10)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
