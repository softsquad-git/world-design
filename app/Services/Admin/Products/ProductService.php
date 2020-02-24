<?php

namespace App\Services\Admin\Products;

use App\Helpers\UploadFileProduct;
use App\Models\Products\Product;
use Illuminate\Support\Facades\Auth;

class ProductService
{

    const STATUS_AVAILABLE = 'AVAILABLE';
    const STATUS_NEWS = 'NEWS';
    const STATUS_PROMO = 'PROMOTION';
    const STATUS_LACK = 'LACK';
    const IMAGE_PATH = 'assets/data/products/images/';

    private function setStatus(array $data): string
    {
        $quantity = $data['quantity'];
        $is_promo = $data['is_promo'];
        $is_news = $data['is_news'];
        $availability = $data['availability'];

        $status = ProductService::STATUS_AVAILABLE;
        if (is_int($quantity) && $quantity == 0)
            return $status = ProductService::STATUS_LACK;

        if (!empty($is_promo) && $is_promo == 1)
            return $status = ProductService::STATUS_PROMO;

        if (!empty($is_news) && $is_news == 1)
            return $status = ProductService::STATUS_NEWS;

        if (!empty($availability) && $availability = 0)
            return $status = 2;

        return $status;
    }

    public function store(array $data): Product
    {
        $data['user_id'] = 1;
        $data['status'] = $this->setStatus($data);
        //$data['colors'] = json_encode($data['colors']);
        $data['sizes'] = json_encode($data['sizes']);
        if ($data['is_promo'] == 1) {
            $data['is_news'] = 0;
        } elseif ($data['is_news'] == 1) {
            $data['is_promo'] = 0;
        }
        $item = Product::create($data);

        return $item;
    }

    public function update(array $data, Product $item): Product
    {
        $data['status'] = $this->setStatus($data);
        //$data['colors'] = json_encode($data['colors']);
        $data['sizes'] = json_encode($data['sizes']);
        if ($data['is_promo'] == 1) {
            $data['is_news'] = 0;
        } elseif ($data['is_news'] == 1) {
            $data['is_promo'] = 0;
        }
        $item->update($data);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function product()
    {
        $item = new Product();

        return $item;
    }

    public function uploadFile($product_id, $files)
    {
        return UploadFileProduct::upload($product_id, $files, ProductService::IMAGE_PATH);
    }


}
