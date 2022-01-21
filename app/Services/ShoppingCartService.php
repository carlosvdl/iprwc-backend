<?php

namespace App\Services;

use App\Models\ShoppingCart;
use App\Models\User;

class ShoppingCartService
{
    public function create(User $user) : void
    {
        $user->shoppingCart = new ShoppingCart(['user_id' => $user->getKey()]);
        $user->shoppingCart->save();
    }

    public function get(): ShoppingCart
    {
        return auth()->user()->shoppingCart;
    }

    public function addProduct(array $data): void
    {
        $shoppingCart = $this->get();
        $shoppingCart->products()->attach($data);
    }

    public function deleteProduct(array $data): void
    {
        $shoppingCart = $this->get();
        $shoppingCart->products()->detach($data);
    }

    public function empty(): void
    {
        $shoppingCart = $this->get();
        $shoppingCart->products()->detach();
    }
}
