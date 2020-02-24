<?php

namespace App\Http\Controllers\Admin\Products;

use App\Helpers\Redirections;
use App\Helpers\UploadFileProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Products\ImageRequest;
use App\Http\Requests\Admin\Products\ProductRequest;
use App\Repositories\Admin\Categories\CategoryRepository;
use App\Repositories\Admin\Colors\ColorRepository;
use App\Repositories\Admin\Products\ProductRepository;
use App\Services\Admin\Products\ProductService;

class ProductController extends Controller
{
    /**
     * @var ProductService
     * @var ProductRepository
     * @var CategoryRepository
     * @var ColorRepository
     */
    private $service;
    private $repository;
    private $toMethod;
    private $categoryRepository;
    private $colorRepository;

    public function __construct(ProductRepository $repository, ProductService $service,
                                CategoryRepository $categoryRepository, ColorRepository $colorRepository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->categoryRepository = $categoryRepository;
        $this->colorRepository = $colorRepository;
        $this->toMethod = 'Admin\Products\ProductController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.products.list', [
            'items' => $items
        ]);
    }

    public function item($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            return view('admin.products.show', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function create()
    {
        $item = $this->service->product();
        $categories = $this->categoryRepository->items();
        $colors = $this->colorRepository->items();

        return view('admin.products.form', [
            'item' => $item,
            'categories' => $categories,
            'colors' => $colors
        ]);
    }

    public function store(ProductRequest $request)
    {
        $item = $this->service->store($request->all());
        if ($request->hasFile('images'))
            $this->service->uploadFile($item->id, $request->file('images'));

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function edit($id)
    {
        $item = $this->repository->find($id);
        if (isset($item->id) && $item->id > 0) {
            $categories = $this->categoryRepository->items();
            $colors = $this->colorRepository->items();
            return view('admin.products.form', [
                'item' => $item,
                'categories' => $categories,
                'colors' => $colors
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function update(ProductRequest $request, $id)
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

    public function uploadImages(ImageRequest $request)
    {
        if ($request->hasFile('images'))
        {
            $this->service->uploadFile($request->item_id, $request->file('images'));

            return redirect()->back();
        }

        return redirect()->back();
    }

    public function removeImage($id)
    {
        UploadFileProduct::remove($id);

        return redirect()->back();
    }

}
