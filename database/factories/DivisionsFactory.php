<?php

namespace Database\Factories;

use App\Models\Divisions;
use App\Models\Classes;
use Illuminate\Database\Eloquent\Factories\Factory;

class DivisionsFactory extends Factory
{
    protected $model = Divisions::class;

    public function definition()
    {
        return [
            'division_name' => 'Division ' . $this->faker->unique()->randomLetter,
            'class_id' => Classes::factory(),
        ];
    }
}
