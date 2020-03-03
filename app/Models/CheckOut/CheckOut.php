<?php

namespace App\Models\CheckOut;

use App\Models\Products\Product;
use App\Models\Shipments\InpostShipment;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    protected $table = 'checkout';

    protected $fillable = [
        'user_id',
        'product_ids',
        'name',
        'post_code',
        'city',
        'address',
        'email',
        'total_price',
        'shipment',
        'size',
        'status',
        'quantity',
        'country',
        'phone',
        '_token'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id')
            ->whereIn('id', json_decode($this->product_ids));
    }
    public function inpostShipment()
    {
        return $this->hasOne(InpostShipment::class, 'order_id', 'id');
    }
}
