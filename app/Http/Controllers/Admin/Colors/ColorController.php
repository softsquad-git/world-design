<?php

namespace App\Http\Controllers\Admin\Colors;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Colors\ColorRequest;
use App\Repositories\Admin\Colors\ColorRepository;
use App\Services\Admin\Colors\ColorService;

class ColorController extends Controller
{
    /**
     * @var ColorRepository
     * @var ColorService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(ColorService $service, ColorRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Colors\ColorController@items';
    }

    public function items()
    {
        $items = $this->repository->items();
        $item = $this->service->color();

        return view('admin.colors.list', [
            'items' => $items,
            'item' => $item
        ]);
    }

    public function create()
    {
        $item = $this->service->color();

        return view('admin.colors.form', [
            'item' => $item
        ]);
    }

    public function store(ColorRequest $request)
    {
        $this->service->store($request->all());

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            return view('admin.colors.form', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function update(ColorRequest $request, $id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            $this->service->update($request->all(), $item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            $this->service->delete($item);

            return Redirections::redirectToRemoved($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
