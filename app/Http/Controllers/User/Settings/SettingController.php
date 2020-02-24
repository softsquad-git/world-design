<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Repositories\User\Settings\SettingRepository;
use App\Services\User\Settings\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * @var SettingRepository
     * @var SettingService
     */
    private $repository;
    private $service;

    public function __construct(SettingRepository $repository, SettingService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
