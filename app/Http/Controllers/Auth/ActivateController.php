<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\VerifyEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateRequest;
use App\Mail\User\SuccessRegisterMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ActivateController extends Controller
{
    public function activate()
    {
        return view('auth.activate');
    }

    public function activateAccount(ActivateRequest $request)
    {
        $item = VerifyEmail::checkKeys($request->key);
        if ($item == true)
        {
            User::where('id', Auth::id())
                ->update([
                    'activated' => 1
                ]);
            VerifyEmail::removeKey();

            Mail::to(Auth::user()->email)->send(new SuccessRegisterMail());

            return redirect()->route('home')->with('front.activate.success');
        }

        return redirect()->back()
            ->with('message', trans('front.activate.error'));
    }
}
