<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        Course::firstOrCreate(
            ['title' => 'Data Structures'],
            [
                'description' => 'Learn arrays, stacks, queues, trees, and graphs',
                'status' => 'published',
                'teacher_id' => 2, // make sure this teacher exists
            ]
        );

        Course::firstOrCreate(
            ['title' => 'Computer Networks'],
            [
                'description' => 'Networking fundamentals and protocols',
                'status' => 'published',
                'teacher_id' => 2,
            ]
        );
    }
}
