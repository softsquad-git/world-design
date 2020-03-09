<?php

namespace App\Repositories\User\Orders;

use App\Models\CheckOut\CheckOut;
use App\Models\Products\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{

    public function items()
    {
        $user = $this->find();
        $items = $user->orders()->orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find()
    {
        return User::find(Auth::id());
    }

    public function findCheckout($id){
        $item = CheckOut::find($id);
        $item->products = Product::whereIn('id', json_decode($item->product_ids))
            ->get();

        return $item;
    }

}
