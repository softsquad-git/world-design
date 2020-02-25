<?php


namespace App\Repositories\Front\Products;


use App\Helpers\Status;
use App\Models\Products\Product;

class ProductRepository
{

    public function trending(){
        $items = Product::orderBy('views', 'DESC')
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->limit(5)
            ->get();

        return $items;
    }

    public function our_products()
    {
        $items = Product::orderBy('created_at', 'DESC')
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->limit(4)
            ->get();

        return $items;
    }

    public function products(array $search){
        $title = $search['title'];
        $items = Product::where('status', Status::PRODUCT_STATUS_AVAILABLE)
            ->orWhere('status', Status::PRODUCT_STATUS_NEWS)
            ->orWhere('status', Status::PRODUCT_STATUS_PROMO)
            ->orderBy('id', 'DESC');
        $items->where('title', 'like', '%' . $title . '%');

        return $items
            ->paginate(20);
    }

    public function find($id)
    {
        return Product::find($id);
    }

    public function show($item)
    {
        $views = $item->views;
        $item->update([
            'views' => $views + 1
        ]);

        return true;
    }

}
