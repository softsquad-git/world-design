<?php

namespace App\Repositories\Front\Basket;

use App\Helpers\Status;
use App\Models\Basket\Basket;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BasketRepository
{

    public function items()
    {
        if (Auth::check()) {
            $items = Basket::where('user_id', Auth::id())
                ->whereHas('product', function ($query){
                    $query->where('status', '!=', Status::PRODUCT_STATUS_LACK);
                })
                ->get();

        } else {
            $items = Basket::where('local_id', Session::get('local_id'))
                ->whereHas('product', function ($query){
                    $query->where('status', '!=', Status::PRODUCT_STATUS_LACK);
                })
                ->get();
        }
        $total_price = 0;

        foreach ($items as $item) {
            $total_price += $item->product->price * $item->quantity;
        }

        $items->total_price = $total_price;

        return $items;


    }

    public function find($id)
    {
        $item = Basket::find($id);

        return $item;
    }

}
