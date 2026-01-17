<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class TeacherUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create teacher user
        $teacher = User::firstOrCreate(
            [
                'email' => 'teacher@lms.com',
            ],
            [
                'name' => 'Demo Teacher',
                'password' => Hash::make('teacher123'),
                'status' => 'active',
            ]
        );

        // Attach teacher role
        $teacherRole = Role::where('name', 'teacher')->first();

        if ($teacherRole && ! $teacher->roles()->where('name', 'teacher')->exists()) {
            $teacher->roles()->attach($teacherRole->id);
        }
    }
}
