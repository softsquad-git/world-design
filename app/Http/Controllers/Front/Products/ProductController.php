<?php

namespace App\Http\Controllers\Front\Products;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Repositories\Front\Products\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    private $repository;
    private $toMethod;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
        $this->toMethod = 'Front\Products\ProductController@products';
    }

    public function products(Request $request)
    {
        $search = [
            'title' => $request->input('title')
        ];

        $products = $this->repository->products($search);

        return view('front.shops.products-list', [
            'products' => $products
        ]);
    }

    public function product($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)) {
            $this->repository->show($item);

            return view('front.shops.product', [
                'product' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
