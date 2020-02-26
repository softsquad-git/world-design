<?php

namespace App\Repositories\User\Orders;

use App\Models\Products\Product;
use App\User;
use Illuminate\Support\Facades\Auth;

class OrderRepository
{

    public function items()
    {
        $user = $this->find();
        $item = $user->orders()->orderBy('id', 'DESC')
            ->paginate(20);

        return $item;
    }

    public function find()
    {
        return User::find(Auth::id());
    }

}
