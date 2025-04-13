<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class Weight_logFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'date' => $this->faker->date(),
            'weight' => $this->faker->randomFloat(1, 40, 60),
            'calories' => $this->faker->randomFloat(1200, 1300),
            'exercise_time' => $this->faker->time(),
            'exercise_content' => $this->faker->text(120),
        ];
    }
}
