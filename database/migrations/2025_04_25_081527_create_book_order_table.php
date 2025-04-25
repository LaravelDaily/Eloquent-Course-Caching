<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('book_order', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained();
            $table->foreignId('order_id')->constrained();
            $table->unsignedInteger('quantity')->default(1);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('book_order');
    }
};
