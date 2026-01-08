<?php

namespace App\Services;

use App\Events\ProductCreated;
use App\Events\ProductDeleted;
use App\Events\ProductUpdated;
use App\Jobs\SendProductCreatedEmail;
use App\Models\Product;

class ProductService
{
    public function getAll()
    {
        return Product::latest()->get();
    }

    public function store(array $data)
    {
        $product = Product::create($data);

        event(new ProductCreated($product));

        return $product;
    }

    public function update(Product $product, array $data)
    {
        $product->update($data);
        event(new ProductUpdated($product));
        return $product;
    }

    public function delete(Product $product)
    {
        event(new ProductDeleted($product));
        return $product->delete();
    }
}
