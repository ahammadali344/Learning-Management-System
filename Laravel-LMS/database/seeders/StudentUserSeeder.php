<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class StudentUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create student user
        $student = User::firstOrCreate(
            [
                'email' => 'student@lms.com',
            ],
            [
                'name' => 'Demo Student',
                'password' => Hash::make('student123'),
                'status' => 'active',
            ]
        );

        // Attach student role
        $studentRole = Role::where('name', 'student')->first();

        if ($studentRole && ! $student->roles()->where('name', 'student')->exists()) {
            $student->roles()->attach($studentRole->id);
        }
    }
}
