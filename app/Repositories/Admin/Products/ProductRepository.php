<?php


namespace App\Repositories\Admin\Products;


use App\Models\Products\Product;

class ProductRepository
{

    public function items()
    {
        $items = Product::orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        $item = Product::find($id);

        return $item;
    }

}
