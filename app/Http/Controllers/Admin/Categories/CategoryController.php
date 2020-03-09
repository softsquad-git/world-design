<?php

namespace App\Http\Controllers\Admin\Categories;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Categories\CategoryRequest;
use App\Repositories\Admin\Categories\CategoryRepository;
use App\Services\Admin\Categories\CategoryService;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     * @var CategoryService
     */
    private $service;
    private $repository;
    private $toMethod;

    public function __construct(CategoryService $service, CategoryRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Categories\CategoryController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.categories.list', [
            'items' => $items
        ]);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            return view('admin.categories.products', [
                'items' => $item->products
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function create()
    {
        $item = $this->service->category();

        return view('admin.categories.form', [
            'item' => $item
        ]);
    }

    public function store(CategoryRequest $request)
    {
        $this->service->store($request->all());

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            return view('admin.categories.form', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function update(CategoryRequest $request, $id)
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

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
