<?php

namespace App\Http\Controllers\Front\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Basket\CheckOutRequest;
use App\Services\Front\Basket\CheckOutService;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * @var CheckOutService
     */
    private $service;

    public function __construct(CheckOutService $service)
    {
        $this->service = $service;
    }

    public function store(CheckOutRequest $request)
    {
        $item = $this->service->store($request->all());

        return $this->success($item);
    }

    public function success($item)
    {
        return view('front.basket.success-checkout', [
            'item' => $item
        ]);
    }
}
