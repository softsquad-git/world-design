<?php

namespace App\Http\Controllers\Admin\CheckOuts;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CheckOuts\CheckOutChangeStatusRequest;
use App\Repositories\Admin\CheckOuts\CheckOutRepository;
use App\Services\Admin\CheckOuts\CheckOutService;
use PDF;

class CheckOutController extends Controller
{
    /**
     * @var CheckOutRepository
     * @var CheckOutService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(CheckOutService $service, CheckOutRepository $repository)
    {
        $this->service = $service;
        $this->repository = $repository;
        $this->toMethod = 'Admin\CheckOuts\CheckOutController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.checkouts.list', [
            'items' => $items
        ]);
    }

    public function realization()
    {
        $items = $this->repository->realization();

        return view('admin.checkouts.realization', [
            'items' => $items
        ]);
    }

    public function changeStatus(CheckOutChangeStatusRequest $request, $id)
    {
        $item = $this->repository->find($id);
        $item = $this->service->changeStatus($request->status, $item);

        return response()->json([
            'item' => $item
        ]);
    }

    public function show($id)
    {
        $item = $this->repository->item($id);
        if (isset($item->id) && $item->id > 0)
            return view('admin.checkouts.show', ['item' => $item]);

        return Redirections::redirectToError($this->toMethod);
    }

    public function pdf($id)
    {
        $item = $this->repository->item($id);
        if (isset($item->id) && $item->id > 0)
        {
            $pdf = PDF::loadView('pdf.admin.order', ['item' => $item]);
            return $pdf->download('order.pdf');
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
