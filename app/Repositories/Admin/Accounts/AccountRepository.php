<?php

namespace App\Repositories\Admin\Accounts;

use App\User;
use Illuminate\Support\Facades\Auth;

class AccountRepository
{

    public function item(){
        $user = User::find(Auth::id());
        $user->contact = $user->contact;

        return $user;
    }

    public function find()
    {
        return User::find(Auth::id());
    }

}
