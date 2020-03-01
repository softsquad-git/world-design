<?php


namespace App\Repositories\Front\Basket;


use App\Models\CheckOut\CheckOut;

class CheckoutRepository
{

    public function find($id){
        return CheckOut::find($id);
    }

}
