<?php

namespace App\Http\Controllers\Front\Basket;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Basket\BasketRequest;
use App\Repositories\Front\Basket\BasketRepository;
use App\Services\Front\Basket\BasketService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BasketController extends Controller
{
    /**
     * @var BasketRepository
     * @var BasketService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(BasketService $service, BasketRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Front\Basket\BasketController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('front.basket.index', [
            'products' => $items
        ]);
    }

    public function store(BasketRequest $request){
        $products = [
            'product_id' => $request->product_id,
            'size' => $request->size,
            'quantity' => $request->quantity
        ];
        $this->service->store($products);

        return redirect()->back();
    }

    public function delete($id){

        $item = $this->repository->find($id);

        if (Auth::check())
        {
            if (!empty($item) && $item->user_id == Auth::id())
            {
                $this->service->delete($item);

                return response()->json([
                    'success' => 1,
                    'total_price' => $this->repository->items()->total_price
                ]);
            }

            return Redirections::redirectToError($this->toMethod);
        }


        if (!empty($item) && $item->local_id == Session::get('local_id')){
            $this->service->delete($item);

            return response()->json([
                'success' => 1,
                'total_price' => $this->repository->items()->total_price
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function changeQuantity($basketID)
    {
        $item = $this->repository->find($basketID);
        if (isset($item->id) && $item->id > 0)
        {
            $item = $this->service->changeQuantity($item, request('quantity'));


            return response()->json([
                'data' => $item,
                'total_price' => $this->repository->items()->total_price
            ]);
        }

        return response()->json([
            'error' => true
        ]);
    }
}
