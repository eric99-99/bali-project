<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFActory extends Factory
{
    /**
     * Define the model's default state.php artisan cache:config
     *
     * @return array
     */
    public function definition()
    {
        return [
            'employee_id' => $this->faker->unique()->numberBetween(1, \App\Models\Employee::count()),
            'company_name' => $this->faker->sentence,
            'start_date' =>$this->faker->dateTime()->format('Y-m-d'),
            'job_description' => $this->faker->sentence,
        ];
    }
}
