<?php

namespace App\Models\Payments;

use Illuminate\Database\Eloquent\Model;

class PaymentPayu extends Model
{
    protected $table = 'payments_payu';

    protected $fillable = [
        'order_token',
        'order_id'
    ];
}
