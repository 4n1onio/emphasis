<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Registration>
 */
class RegistrationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'school_year_id' => fake()->numberBetween(1, 3),
            'student_id' => fake()->numberBetween(1, 64),
            'school_class_id' => fake()->numberBetween(1, 4),
            'course_id' => fake()->numberBetween(1, 12),
            'status' => fake()->boolean(90)
        ];
    }
}
