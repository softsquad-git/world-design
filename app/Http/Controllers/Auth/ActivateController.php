<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\VerifyEmail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

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

            return redirect()->back()->with('front.activate.success');
        }

        return redirect()->back()
            ->with('message', trans('front.activate.error'));
    }
}
