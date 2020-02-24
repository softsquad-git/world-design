<?php

namespace App\Repositories\Admin\Users;

use App\Helpers\Status;
use App\User;

class UserRepository
{

    public function items()
    {
        $items = User::orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        $item = User::find($id);

        return $item;
    }

    public function locked()
    {
        $items = User::where('status', Status::USER_STATUS_LOCK)
            ->orderBy('created_at', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function news()
    {
        $items = User::orderBy('created_at', 'DESC')
            ->limit(10)
            ->get();

        return $items;
    }

}
