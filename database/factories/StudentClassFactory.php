<?php

namespace Database\Factories;

use App\Models\StudentClass;
use App\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentClassFactory extends Factory
{
    protected $model = StudentClass::class;

    public function definition(): array
    {
        return [
            'student_id' => 1, // override in seeder if needed
            'class_division_id' => 1, // override in seeder if needed
            'is_active' => true,
            'academic_year_id' => AcademicYear::first()->id,
        ];
    }
}
