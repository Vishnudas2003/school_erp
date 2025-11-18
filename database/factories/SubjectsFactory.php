<?php

namespace Database\Factories;

use App\Models\Subjects;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubjectsFactory extends Factory
{
    protected $model = Subjects::class;

    public function definition()
    {
        return [
            'subject_name' => $this->faker->unique()->word,
        ];
    }
}
