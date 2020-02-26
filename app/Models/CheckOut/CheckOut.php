<?php

namespace App\Models\CheckOut;

use App\Models\Products\Product;
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
        'country'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'id')
            ->whereIn('id', $this->product_ids);
    }
}
