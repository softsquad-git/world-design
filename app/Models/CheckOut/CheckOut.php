<?php

namespace App\Models\CheckOut;

use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table = 'checkout';

    protected $fillable = [
        'user_id',
        'product_ids',
        'name',
        'last_name',
        'post_code',
        'city',
        'street',
        'number_home',
        'number_local',
        'email',
        'number_phone',
        'total_price',
        'shipment',
        'size',
        'status',
        'quantity'
    ];
}
