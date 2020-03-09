<?php

namespace App\Models\Products;

use App\Services\Admin\Products\ProductService;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'product_images';

    protected $fillable = [
        'product_id',
        'file'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function getImage()
    {
        if (!empty($this->file)) {
            return asset(ProductService::IMAGE_PATH . $this->file);
        }

        return asset(ProductService::IMAGE_PATH . 'df.png');
    }
}
