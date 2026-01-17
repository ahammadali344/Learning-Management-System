<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::firstOrCreate(
            [
                'email' => 'admin@lms.com',
            ],
            [
                'name' => 'System Admin',
                'password' => Hash::make('admin123'),
                'status' => 'active',
            ]
        );

        // Assign admin role
        $adminRole = Role::where('name', 'admin')->first();

        if ($adminRole && ! $admin->roles()->where('name', 'admin')->exists()) {
            $admin->roles()->attach($adminRole->id);
        }
    }
}
