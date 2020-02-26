<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Basket
{

    const products = 0;


    public static function countProductsInBasket()
    {
        if (Auth::check()) {
            return count(\App\Models\Basket\Basket::where('user_id', Auth::id())->get());
        }

        return count(\App\Models\Basket\Basket::where('local_id', Session::get('local_id'))->get());
    }

}
