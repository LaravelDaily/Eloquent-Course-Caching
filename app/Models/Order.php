<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'total_price',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(Book::class);
    }
}
