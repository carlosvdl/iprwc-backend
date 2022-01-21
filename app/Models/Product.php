<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'image_url', 'price'
    ];

    protected $hidden = [
        'pivot'
    ];

    public function shoppingCarts() : BelongsToMany
    {
        return $this->belongsToMany(ShoppingCart::class, 'shopping_cart_products');
    }

}
