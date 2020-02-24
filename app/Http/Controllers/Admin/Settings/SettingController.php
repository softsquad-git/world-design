<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Helpers\Redirections;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Settings\SettingRequest;
use App\Repositories\Admin\Settings\SettingRepository;
use App\Services\Admin\Settings\SettingService;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     * @var SettingService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(SettingService $service, SettingRepository $repository)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'Admin\Settings\SettingController@form';
    }

    public function create()
    {
        $item = $this->service->globalSetting();

        return view('admin.settings.form', [
            'item' => $item
        ]);
    }

    public function store(SettingRequest $request)
    {
        $this->service->store($request->all());

        return Redirections::redirectToSuccess($this->toMethod);
    }

    public function form()
    {
        $item = $this->repository->find(1);
        if (!empty($item)) {
            return view('admin.settings.form', [
                'item' => $item
            ]);
        }

        return view('admin.settings.form', [
            'item' => $this->service->globalSetting()
        ]);

    }


    public function update(SettingRequest $request)
    {
        $item = $this->repository->find(1);
        if (!empty($item)) {
            $this->service->update($request->all(), $item);

            return Redirections::redirectToSuccess($this->toMethod);
        }

        return Redirections::redirectToError($this->toMethod);
    }
}
