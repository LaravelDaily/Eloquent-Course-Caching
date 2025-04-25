<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        $books = Cache::remember('top_books', 60*60*24, function() {
            return Book::join('book_order', 'books.id', '=', 'book_order.book_id')
                ->join('orders', 'book_order.order_id', '=', 'orders.id')
                ->whereRaw('orders.created_at BETWEEN "' . now()->subDays(30)->format('Y-m-d H:i:s') . '"
                AND "' . now()->format('Y-m-d H:i:s') . '"')
                ->selectRaw('books.*, SUM(book_order.quantity) AS books_sold')
                ->groupBy('books.id')
                ->orderBy('books_sold', 'desc')
                ->take(10)
                ->get();
        });

        return view('home', compact('books'));
    }
}
