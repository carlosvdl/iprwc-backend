<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ValidProductRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Database\Eloquent\Collection;

class ProductController
{
    /**
     * @var ProductService
     */
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function post(StoreProductRequest $request) : void
    {
        $this->productService->create($request->validated());
    }

    public function get(ValidProductRequest $request) : Product
    {
        return $this->productService->get($request->validated());
    }

    public function getAll() : Collection
    {
        return $this->productService->getAll();
    }

    public function put(UpdateProductRequest $request) : void
    {
        $this->productService->update($request->validated());
    }

    public function delete(ValidProductRequest $request) : void
    {
        $this->productService->delete($request->validated());
    }
}
