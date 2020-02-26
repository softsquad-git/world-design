<?php


namespace App\Observers\Users;


use App\User;

class UserObserve
{

    public function deleting(User $user)
    {
        $user->contact()->delete();
        $user->orders()->delete();
    }

}
