<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Login;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        Login::create([
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // must be hashed
            'role' => 1, // 1 = Admin
            'is_active' => true,
        ]);

        // Teacher user
        Login::create([
            'email' => 'teacher@example.com',
            'password' => Hash::make('teacher123'),
            'role' => 2, // 2 = Teacher
            'is_active' => true,
        ]);

        // Student user
        Login::create([
            'email' => 'student@example.com',
            'password' => Hash::make('student123'),
            'role' => 3, // 3 = Student
            'is_active' => true,
        ]);

        // Parent user
        Login::create([
            'email' => 'parent@example.com',
            'password' => Hash::make('parent123'),
            'role' => 4, // 4 = Parent
            'is_active' => true,
        ]);
    }
}
