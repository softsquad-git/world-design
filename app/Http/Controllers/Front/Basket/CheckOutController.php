<?php

namespace App\Http\Controllers\Front\Basket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Basket\CheckOutRequest;
use App\Repositories\Front\Basket\CheckoutRepository;
use App\Services\Front\Basket\CheckOutService;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * @var CheckOutService
     * @var CheckOutRepository
     */
    private $service;
    private $repository;

    public function __construct(CheckOutService $service, CheckOutRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function store(CheckOutRequest $request)
    {
        $item = $this->service->store($request->all());

        if ($item->shipment == 'dpd_download')
            return $this->success($item);

        // redirect to payu

        return redirect()->route('payu.payment', $item);
    }

    public function success($item)
    {
        return view('front.basket.success-checkout', [
            'item' => $item
        ]);
    }

}
