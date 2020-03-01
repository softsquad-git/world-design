<?php

namespace App\Models\Shipments;

use Illuminate\Database\Eloquent\Model;

class InpostShipment extends Model
{
    protected $table = 'inpost_shipment';

    protected $fillable = [
        'order_id',
        'inpost_number'
    ];
}
