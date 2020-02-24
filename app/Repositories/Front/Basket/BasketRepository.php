<?php

namespace App\Repositories\Front\Basket;

use App\Models\Basket\Basket;
use Illuminate\Support\Facades\Auth;

class BasketRepository
{

    public function items()
    {
        if (Auth::check())
        {
            $items = Basket::where('user_id', Auth::id())
                ->get();

            $total_price = 0;

            foreach ($items as $item)
            {
                $total_price += $item->product->price * $item->quantity;
            }

            $items->total_price = $total_price;

            return $items;
        }

        return [];
    }

    public function find($id)
    {
        $item = Basket::find($id);

        return $item;
    }

}
