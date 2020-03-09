<?php

namespace App\Models\Products;

use App\Models\Basket\Basket;
use App\Models\Categories\Category;
use App\Services\Admin\Products\ProductService;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'user_id',
        'title',
        'category_id',
        'price',
        'description',
        'content',
        'colors',
        'sizes',
        'quantity',
        'availability',
        'is_promo',
        'is_news',
        'old_price',
        'status',
        'views',
        'locale',
        'meta_title',
        'meta_keywords',
        'meta_description'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }

    public function getImage()
    {
        $images = $this->images();
        if ($images->count() > 0)
        {
            return $images->first()->getImage();
        }

        return asset(ProductService::IMAGE_PATH . 'df.png');
    }

    public function basket()
    {
        return $this->hasOne(Basket::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
