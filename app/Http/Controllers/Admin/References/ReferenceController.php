<?php

namespace App\Http\Controllers\Admin\References;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\References\ReferenceRepository;
use App\Services\Admin\References\ReferenceService;

class ReferenceController extends Controller
{
    /**
     * @var ReferenceService
     * @var ReferenceRepository
     */
    private $service;
    private $repository;
    private $toMethod;

    public function __construct(ReferenceService $service, ReferenceRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\References\ReferenceController@items';
    }

    public function items()
    {
        $items = $this->repository->items();

        return view('admin.references.list', [
            'items' => $items
        ]);
    }

    public function show($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
        {
            return view('admin.references.show', [
                'item' => $item
            ]);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function accept($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item)){
            $this->service->update($item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }

    public function delete($id)
    {
        $item = $this->repository->find($id);
        if (!empty($item))
        {
            $this->service->delete($item);

            return Redirections::redirectToRemoved($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
