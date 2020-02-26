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

        //dd(Session::get('products'));

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
        if (Auth::check())
        {
            $item = $this->repository->find($id);
            if (!empty($item) && $item->user_id == Auth::id())
            {
                $this->service->delete($item);

                return redirect()->back();
            }

            return Redirections::redirectToError($this->toMethod);
        }


        return redirect()->back();
    }
}
