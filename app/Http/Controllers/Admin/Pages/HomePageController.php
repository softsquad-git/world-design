<?php

namespace App\Http\Controllers\Admin\Pages;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Pages\HomePageRequest;
use App\Repositories\Admin\Pages\HomePageRepository;
use App\Services\Admin\Pages\HomePageService;

class HomePageController extends Controller
{
    /**
     * @var HomePageRepository
     * @var HomePageService
     */
    private $service;
    private $repository;
    private $toMethod;

    public function __construct(HomePageService $service, HomePageRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Pages\HomePageController@form';
    }

    public function form()
    {
        $item = $this->repository->find();

        if (empty($item))
            return view('admin.pages.home-page', ['item' => $this->service->hp()]);
        else
            return view('admin.pages.home-page', ['item' => $item, 'field' => json_decode($item->fields)]);
    }

    public function store(HomePageRequest $request)
    {
        $this->service->store($request->all(), $request->file('about_section_img'));

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function update(HomePageRequest $request, $id)
    {
        $item = $this->repository->findID($id);
        if (!empty($item))
        {
            $this->service->update($request->all(), $request->file('about_section_img'), $item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
