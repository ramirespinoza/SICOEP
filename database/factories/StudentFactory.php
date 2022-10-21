<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'personal_code' => $this->faker->unique()->regexify('[A-Z]{2}[0-9]{3}[A-Z]{3}'),
            'name'      => $this->faker->firstName().' '. $this->faker->firstName(),
            'last_name' => $this->faker->lastName().' '. $this->faker->lastName(),
            'grade_id'  => 1,
            'section'  => $this->faker->randomElement($array = array ('A','B','C')), // 'b',
            'birth_date'  => $this->faker->date($format = 'Y-m-d', $max = '2015-00-00'),
            'identification_document'           => 'CUI',
            'identification_document_number'    => $this->faker->randomNumber($nbDigits = 9, $strict = false),
            'class_schedule_id' => 1,
            'professor_dpi' => $this->faker->randomNumber($nbDigits = 9, $strict = false),
            'tutelary_name' => $this->faker->name($gender = 'female'),
            'tutelary_dpi' => $this->faker->randomNumber($nbDigits = 9, $strict = false),

        ];
    }
}
