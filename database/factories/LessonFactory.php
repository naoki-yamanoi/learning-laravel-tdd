<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'coach_name' => $this->faker->name,
            'capacity' => $this->faker->randomNumber(2),
            'start_at' => $this->faker->dateTime,
            'end_at' => $this->faker->dateTime,
        ];
    }
}
