<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddToShoppingCartRequest;
use App\Http\Requests\DeleteFromShoppingCartRequest;
use App\Models\ShoppingCart;
use App\Services\ShoppingCartService;

class ShoppingCartController
{
    /**
     * @var ShoppingCartService
     */
    private $shoppingCartService;

    public function __construct(ShoppingCartService  $shoppingCartService)
    {
        $this->shoppingCartService = $shoppingCartService;
    }

    public function get() : ShoppingCart
    {
        return $this->shoppingCartService->get();
    }

    public function addProduct(AddToShoppingCartRequest $request) : void
    {
        $this->shoppingCartService->addProduct($request->validated());
    }

    public function deleteProduct(DeleteFromShoppingCartRequest $request) : void
    {
        $this->shoppingCartService->deleteProduct($request->validated());
    }

    public function empty() : void
    {
        $this->shoppingCartService->empty();
    }
}

