<?php


namespace App\Services\Front\Basket;

use App\Models\Basket\Basket;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BasketService
{

    public function store(array $data)
    {
        $data['local_id'] = Session::get('local_id');

        if (Auth::check())
        {
            Basket::where(['user_id' => Auth::id(), 'product_id' => $data['product_id']])->delete();

            $data['user_id'] = Auth::id();
            $item = Basket::create($data);

            return $item;
        }

        Basket::where(['local_id' => $data['local_id'], 'product_id' => $data['product_id']])->delete();

        $data['user_id'] = 0;
        $item = Basket::create($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function changeQuantity($item, $quantity)
    {
        $product = Product::find($item->product_id);
        if ($quantity > $product->quantity)
            return false;

        $item->update([
            'quantity' => $quantity
        ]);

        return $item;
    }

}
