<?php


namespace App\Observers\Products;


use App\Models\Products\Product;

class ProductObserver
{

    public function deleting(Product $product)
    {
        $product->basket()->delete();
    }

}
