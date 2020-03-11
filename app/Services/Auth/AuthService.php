<?php

namespace App\Services\Auth;

use App\Mail\Auth\ResetPasswordMail;
use App\Models\Verify\ResetPassword;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthService
{

    public function generateVerifyUrl(array $data)
    {
        $item = ResetPassword::where('email', $data['email'])
            ->first();

        if (isset($item->id) && $item->id > 0)
            $item->delete();

        $item = ResetPassword::create([
            'email' => $data['email'],
            '_token' => Str::random(64)
        ]);

        Mail::to($item->email)->send(new ResetPasswordMail($item));

        return $item;
    }


    public function resetPassword(array $data)
    {
        $_token = $data['_token_v'];
        $v = ResetPassword::where('_token', $_token)
            ->first();
        if (isset($v->id) && $v->id > 0) {

            // reset password

            $user = User::where('email', $v->email)
                ->first();

            if (isset($user->id) && $user->id > 0)
                $user->update(['password' => Hash::make($data['password'])]);
            else
                return false;

            $v->delete();

            return true;
        }

        return false;
    }

}
