<?php


namespace App\Repositories\Front\Basket;


use App\Models\CheckOut\CheckOut;

class CheckoutRepository
{

    public function find($id){
        return CheckOut::find($id);
    }

    public function findCheckout($_token)
    {
        $order = CheckOut::where('_token', $_token)
            ->first();

        return $order;
    }

}
