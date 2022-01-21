<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function products() : BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'shopping_cart_products');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
