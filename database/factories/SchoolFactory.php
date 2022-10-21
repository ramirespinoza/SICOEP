<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SchoolFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'      => $this->faker->randomElement($array = array ('EORM','EOUM')).' '.$this->faker->city(),
            'municipality_id'  => 1,
        ];
    }
}
