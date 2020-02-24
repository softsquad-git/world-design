<?php

namespace App\Http\Controllers\Admin\Orders;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Orders\OrderRepository;
use App\Services\Admin\Orders\OrderService;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @var OrderRepository
     * @var OrderService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(OrderService $service, OrderRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $routeArray = app('request')->route()->getAction();
        $this->toMethod = substr($routeArray['controller'], 21);
    }
}
