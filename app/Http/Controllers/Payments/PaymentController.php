<?php

namespace App\Http\Controllers\Payments;

use App\Helpers\PayU;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{

    public function paymentPayU($id)
    {
        return PayU::payment($id);
    }

    public function status($_token)
    {
        return PayU::status($_token);
    }

}
