<?php

namespace App\Http\Controllers\Front\Basket;

use App\Helpers\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Basket\CheckOutRequest;
use App\Models\CheckOut\CheckOut;
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

        return response()->json([
            'item' => $item
        ]);

    }

    public function success($id)
    {
        $item = $this->repository->find($id);

        return view('front.basket.success-checkout', [
            'item' => $item
        ]);
    }

    public function findOrder($token)
    {
        $order = $this->repository->findCheckout($token);
        if (isset($order->id) && $order->id > 0 && $order->status == Status::CHECKOUT_STATUS_SUBMITTED) {
            return view('front.basket.success-checkout', [
                'item' => $order
            ]);
        } elseif ($order->status == Status::CHECKOUT_STATUS_ACCEPTED) {
            return view('front.basket.order', [
                'message' => 'Twoje zamówienie zostało przyjęte do realizacji'
            ]);
        } elseif ($order->status == Status::CHECKOUT_STATUS_SENT) {
            return view('front.basket.order', [
                'message' => 'Zamówione produkty wyruszyły w drogę do Ciebie'
            ]);
        } elseif ($order->status == Status::CHECKOUT_STATUS_REALIZATION) {
            return view('front.basket.order', [
                'message' => 'Twoje zamówienie zostało już zrealizowane'
            ]);
        }

        return redirect()->route('home')
            ->with('message', trans('message.item.404'));


    }

}
