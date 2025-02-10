<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'mobilephone' => $this->faker->phoneNumber,
            'date_of_birth' =>$this->faker->dateTime()->format('Y-m-d'),
            'address' => $this->faker->streetAddress,
        ];
    }
}
