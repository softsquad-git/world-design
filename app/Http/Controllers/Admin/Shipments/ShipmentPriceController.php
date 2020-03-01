<?php

namespace App\Http\Controllers\Admin\Shipments;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Shipments\ShipmentPriceRequest;
use App\Repositories\Admin\Shipments\ShipmentRepository;
use App\Services\Admin\Shipments\ShipmentService;
use Illuminate\Http\Request;

class ShipmentPriceController extends Controller
{
    /**
     * @var ShipmentRepository
     * @var ShipmentService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(ShipmentRepository $repository, ShipmentService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Shipments\ShipmentPriceController@form';
    }

    public function form()
    {
        $item = $this->service->shipment();

        return view('admin.shipments.form', [
            'item' => $item
        ]);
    }

    public function store(ShipmentPriceRequest $request)
    {
        $this->service->store($request->all());

        return Redirections::redirectToSuccess($this->toMethod);
    }
}
