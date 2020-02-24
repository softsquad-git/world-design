<?php

namespace App\Models\Basket;

use App\Models\Products\Product;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
    protected $table = 'basket';

    protected $fillable = [
        'user_id',
        'product_id',
        'size',
        'colors',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
