<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'address' => fake()->address(),
            'price' => fake()->randomFloat(2, 10, 1000),
            'rooms' => random_int(1, 20),
            'square' => fake()->randomFloat(0, 20, 1000),
            'description' => fake()->text(10),
            'gender' => fake()->randomElement(['male', 'female']),
            'user_id' => User::get()->random()->id,
            'branch_id' => Branch::get()->random()->id,
            'status_id' => Status::get()->random()->id,
        ];
    }
}
