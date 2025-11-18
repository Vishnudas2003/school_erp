<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Login;
use App\Models\Parents;
use App\Models\Students;
use App\Models\Subjects;
use App\Models\Teachers;
use App\Models\Classes;
use App\Models\Divisions;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Login::factory()->count(2)->admin()->create();
        // Subjects first
        $subjects = Subjects::factory()->count(5)->create();

        // Classes & Divisions
        $classes = Classes::factory()->count(3)->create();
        foreach ($classes as $class) {
            Divisions::factory()->count(2)->create(['class_id' => $class->id]);
        }

        // Teachers (each with a random subject)
        Teachers::factory()->count(10)->create();

        // Parents
        $parents = Parents::factory()->count(5)->create();

        // Students (link each student to a random parent)
        Students::factory()->count(20)->create([
            'parent_id' => $parents->random()->id
        ]);
    }
}
