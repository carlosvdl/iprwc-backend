<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class ShoppingCartTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::all();

        User::all()->each(function (User $user) use ($products) {
          $shoppingCart = new ShoppingCart([
              'user_id' => $user->getKey()
          ]);

          $shoppingCart->save();

          $shoppingCartProducts = $products->random(rand(3,5));
          $shoppingCart->products()->saveMany($shoppingCartProducts);
        });
    }
}
