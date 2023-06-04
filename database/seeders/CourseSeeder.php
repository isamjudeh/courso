<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = Course::factory()->count(5)->create();
        $courses->each(function ($item, $key) {
            $teacher = Teacher::factory()->create();
            $teacher->courses()->attach($item);
            $teacher = Teacher::factory()->create();
            $teacher->courses()->attach($item);
        });
    }
}
