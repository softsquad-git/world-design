<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Front\Products\ProductRepository;
use App\Repositories\Front\References\ReferenceRepository;

class HomeController extends Controller
{

    private $productsRepository;
    private $referencesRepository;

    public function __construct(ProductRepository $productRepository, ReferenceRepository $referenceRepository)
    {
        $this->productsRepository = $productRepository;
        $this->referencesRepository = $referenceRepository;
    }

    public function index()
    {
        $trending = $this->productsRepository->trending();
        $our_products = $this->productsRepository->our_products();
        $references = $this->referencesRepository->items();

        return view('front.pages.home', [
            'trending' => $trending,
            'our_products' => $our_products,
            'references' => $references
        ]);
    }
}
