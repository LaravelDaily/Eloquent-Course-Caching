<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Order;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $books = Book::factory(50000)->create();

        $bookIds = $books->pluck('id');

        Order::factory(100000)->create()->each(function($order) use ($bookIds) {
            $order->books()->attach($bookIds->random(), ['quantity' => rand(1,3)]);
        });
    }
}
