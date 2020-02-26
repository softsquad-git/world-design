<?php


namespace App\Services\User\Settings;

use App\User;

class SettingService
{

    public function update(array $user, array $contact, User $item)
    {
        $item->update($user);
        $item->contact()->update($contact);

        return $item;
    }

}
