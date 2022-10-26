<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentEnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'grade_id'  => 1,
            'section'  => $this->faker->randomElement($array = array ('A','B','C')), // 'b',
            'class_schedule_id' => 1,
            'professor_dpi' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
        ];
    }
}
