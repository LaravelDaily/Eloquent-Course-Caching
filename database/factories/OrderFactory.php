<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'email'       => fake()->unique()->safeEmail(),
            'total_price' => rand(1000,9999) / 100,
            'created_at'  => now()->subDays(rand(1, 180)),
        ];
    }
}
