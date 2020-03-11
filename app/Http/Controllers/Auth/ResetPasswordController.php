<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ResetPasswordRequest;
use App\Http\Requests\Auth\SendKeyResetPasswordRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{

    /**
     * @var AuthService
     */
    private $service;

    public function __construct(AuthService $service)
    {
        $this->service = $service;
    }

    public function view()
    {
        return view('auth.reset');
    }

    public function sendVerifyKey(SendKeyResetPasswordRequest $request)
    {
        $this->service->generateVerifyUrl($request->all());

        return redirect()->route('home')
            ->with('message', trans('auth.password.send-key'));
    }

    public function newPassView($_token)
    {
        return view('auth.new-password', [
            '_token' => $_token
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $item = $this->service->resetPassword($request->all());

        if ($item == true)
        {
            return redirect()
                ->route('home')
                ->with('message', trans('auth.password.success-reset'));
        }

        return redirect()->back()
            ->with('message', trans('auth.user-key.empty'));
    }

}
