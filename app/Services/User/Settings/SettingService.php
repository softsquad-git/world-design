<?php


namespace App\Services\User\Settings;

use App\User;
use Illuminate\Support\Facades\Hash;

class SettingService
{

    public function update(array $user, array $contact, User $item)
    {
        $item->update($user);
        $item->contact()->update($contact);

        return $item;
    }

    public function newPass(array $data, User $user)
    {
        if (Hash::check($data['old_password'], $user->password))
        {
            $user->update([
                'password' => Hash::make($data['new_password'])
            ]);

            return true;
        }

        return false;
    }

}
