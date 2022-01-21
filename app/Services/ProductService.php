<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public function create(array $data) : void
    {
        $this->save(new Product, $data);
    }

    public function get(array $data) : Product
    {
        return Product::findOrFail($data['id']);
    }

    public function getAll() : Collection
    {
        return Product::all();
    }

    public function update(array $data) : void
    {
        $product = $this->get($data);
        $this->save($product, $data);
    }

    public function delete(array $data) : void
    {
        Product::findOrFail($data['id'])->delete();
    }

    private function save(Product $product, array $data) : void
    {
        $product->fill($data);
        $product->save();
    }
}
