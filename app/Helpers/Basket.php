<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Basket
{

    const products = 0;

    public static function addProductToBasket($products)
    {

       dd(self::getProductsFromBasket(), $products);
    }

    public static function removeProductInBasket($id)
    {

    }

    public static function getProductsFromBasket()
    {
        return Session::get('products');
    }

    public static function countProductsInBasket()
    {
        if (Auth::check()) {
            return count(\App\Models\Basket\Basket::where('user_id', Auth::id())->get());
        }

        return 1;
    }

}
