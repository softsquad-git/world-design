<?php

namespace App\Services\Admin\Users;

use App\Models\Users\Contact;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    const STATUS_OK = 'OK';
    const STATUS_LOCK = 'LOCK';

    public function store(array $user, array $contact)
    {
        DB::transaction(function () use ($user, $contact) {
            $user['password'] = Hash::make($user['password']);
            $user = User::create($user);
            $contact['user_id'] = $user->id;
            Contact::create($contact);
        });

        return true;
    }

    public function update(array $user, array $contact, User $item): User
    {
        $item->update($user);
        $item->contact()->update($contact);

        return $item;
    }

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function user()
    {
        $item = new User();

        return $item;
    }

    public function lock($item)
    {
        $status = $item->status;
        if ($status == UserService::STATUS_OK)
        {
            User::where('id', $item->id)
                ->update(['status' => UserService::STATUS_LOCK]);

            return $item;
        }

        User::where('id', $item->id)
            ->update(['status' => UserService::STATUS_OK]);

        return $item;
    }

}
