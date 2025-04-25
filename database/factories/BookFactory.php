<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title'       => fake()->text(50),
            'price'       => rand(1000,9999) / 100,
            'description' => fake()->text(),
        ];
    }
}
