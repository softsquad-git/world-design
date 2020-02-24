<?php

namespace App\Http\Controllers\Admin\CheckOuts;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\CheckOuts\CheckOutRepository;
use App\Services\Admin\CheckOuts\CheckOutService;
use Illuminate\Http\Request;

class CheckOutController extends Controller
{
    /**
     * @var CheckOutRepository
     * @var CheckOutService
     */
    private $repository;
    private $service;

    public function __construct(CheckOutService $service, CheckOutRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.checkouts.list', [
            'items' => $items
        ]);
    }
}
