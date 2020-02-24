<?php


namespace App\Services\Front\Basket;

use App\Models\Basket\Basket;
use Illuminate\Support\Facades\Auth;

class BasketService
{

    public function store(array $data)
    {
        if (Auth::check())
        {
            Basket::where(['user_id' => Auth::id(), 'product_id' => $data['product_id']])->delete();

            $data['user_id'] = Auth::id();
            $item = Basket::create($data);

            return $item;
        }

        \App\Helpers\Basket::addProductToBasket($data);

        return true;

    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

}
