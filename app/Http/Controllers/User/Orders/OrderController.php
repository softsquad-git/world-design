<?php

namespace App\Http\Controllers\User\Orders;

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

    public function __construct(OrderService $service, OrderRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
