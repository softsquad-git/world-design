<?php

namespace App\Models\Shipments;

use Illuminate\Database\Eloquent\Model;

class ShipmentPrice extends Model
{
    protected $table = 'shipment_price';

    protected $fillable = [
        'dpd_classic',
        'dpd_download',
        'inpost_classic',
        'inpost_download'
    ];
}
