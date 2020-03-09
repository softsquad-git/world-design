<?php


namespace App\Repositories\Front\Products;


use App\Helpers\Status;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Session;

class ProductRepository
{

    public function trending(){
        $items = Product::orderBy('views', 'DESC')
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->where('locale', Session::get('locale'))
            ->limit(5)
            ->get();

        return $items;
    }

    public function our_products()
    {
        $items = Product::orderBy('created_at', 'DESC')
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->where('locale', Session::get('locale'))
            ->limit(4)
            ->get();

        return $items;
    }

    public function products(array $search){
        $title = $search['title'];
        $items = Product::where('title', 'like', '%' . $title . '%')
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->where('locale', Session::get('locale'));

        return $items
            ->paginate(20);
    }

    public function find($id)
    {
        return Product::where('id', $id)
            ->where('status', '!=', Status::PRODUCT_STATUS_LACK)
            ->first();
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
