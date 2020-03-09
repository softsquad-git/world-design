<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\User\Settings\SettingRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var SettingRepository
     */
    private $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }

    public function profile()
    {
        $item = $this->repository->item();
        return view('user.profile', [
            'item' => $item
        ]);
    }
}
