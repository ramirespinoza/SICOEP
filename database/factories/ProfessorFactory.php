<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfessorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dpi'       => $this->faker->randomNumber($nbDigits = 9, $strict = false),
            'name'      => $this->faker->firstName().' '. $this->faker->firstName(),
            'last_name' => $this->faker->lastName().' '. $this->faker->lastName(),
            'school_id'  => 1,
        ];
    }
}
