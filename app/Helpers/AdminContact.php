<?php

namespace App\Helpers;

use App\Mail\Admin\BuyProductMail;
use Illuminate\Support\Facades\Mail;

class AdminContact
{

    public static function buyProduct($item)
    {
        Mail::to(GlobalSetting::getEmail())
            ->send(new BuyProductMail($item));
    }

}
