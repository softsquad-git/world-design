<?php

namespace App\Http\Controllers\Payments;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Tzsk\Payu\Facade\Payment;

class PaymentController extends Controller
{
    public function payment()
    {
        $attributes = [
            'txnid' => strtoupper(str_random(8)), # Transaction ID.
            'amount' => rand(100, 999), # Amount to be charged.
            'productinfo' => "Product Information",
            'firstname' => "John", # Payee Name.
            'email' => "john@doe.com", # Payee Email Address.
            'phone' => "9876543210", # Payee Phone Number.
        ];

        return Payment::make($attributes, function ($then) {
            $then->redirectRoute('payment.status');
        });
    }

    public function status()
    {
        $payment = Payment::capture();
        $payment->isCaptured(); # Returns boolean - true / false
    }
}
