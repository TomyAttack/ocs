<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'position' => fake()->randomElement(['Staff', 'Supervisor', 'Manager']),
            'approver1_name' => fake()->name(),
            'approver1_email' => fake()->unique()->safeEmail(),
            'approver1_position' => fake()->randomElement(['Staff', 'Supervisor', 'Manager']),
            'approver2_name' => fake()->name(),
            'approver2_email' => fake()->unique()->safeEmail(),
            'approver2_position' => fake()->randomElement(['Staff', 'Supervisor', 'Manager']),
        ];
    }
}
