<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\SettingRequest;
use App\Repositories\User\Settings\SettingRepository;
use App\Services\User\Settings\SettingService;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     * @var SettingService
     */
    private $repository;
    private $service;
    private $toMethod;

    public function __construct(SettingRepository $repository, SettingService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->toMethod = 'User\Settings\SettingController@items';
    }

    public function update(SettingRequest $request)
    {
        $item = $this->repository->find();
        $user = $request->only(['name', 'email']);
        $contact = $request->only(['post_code', 'city', 'street', 'address', 'country', 'phone']);
        $this->service->update($user, $contact, $item);

        return redirect()->route('user.profile');
    }
}
