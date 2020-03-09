<?php

namespace App\Http\Controllers\Front\References;

use App\Helpers\Redirections;
use App\Helpers\Status;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\References\ReferenceRequest;
use App\Repositories\Front\References\ReferenceRepository;
use App\Services\Front\References\ReferenceService;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{

    /**
     * @var ReferenceService
     * @var ReferenceRepository
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(ReferenceRepository $repository, ReferenceService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Front\References\ReferenceController@items';
    }

    public function items(){
        $items = $this->repository->items();

        return view('front.references.list', [
            'data' => $items
        ]);
    }

    public function edit($token)
    {
        $item = $this->repository->find($token);
        if (!empty($token) && $item->status == Status::REFERENCE_STATUS_NEW)
            return view('front.references.form', ['token' => $token]);

        return Redirections::redirectToError($this->toMethod);
    }

    public function store(ReferenceRequest $request, $token)
    {
        $item = $this->repository->find($token);
        if (!empty($item) && $item->status == Status::REFERENCE_STATUS_NEW)
        {
            $this->service->update($request->all(), $item);
            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
