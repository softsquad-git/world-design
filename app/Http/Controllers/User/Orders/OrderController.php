<?php

namespace App\Http\Controllers\User\Orders;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Repositories\User\Orders\OrderRepository;
use App\Services\User\Orders\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     * @var OrderService
     */
    private $service;
    private $repository;
    private $toMethod;

    public function __construct(OrderService $service, OrderRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'User\Orders\OrderController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('user.products', [
            'items' => $items
        ]);
    }

    public function find($id)
    {
        $item = $this->repository->findCheckout($id);
        if (isset($item->id) && $item->id > 0)
        {
            return response()->json([
                'item' => $item,
                'products' => $item->products
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
