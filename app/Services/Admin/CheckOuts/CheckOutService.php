<?php

namespace App\Services\Admin\CheckOuts;

use App\Mail\User\ChangeStatusOrder;
use Illuminate\Support\Facades\Mail;

class CheckOutService
{

    public function changeStatus($status, $item)
    {
        $item->update([
            'status' => $status
        ]);

        Mail::to("$item->email")->send(new ChangeStatusOrder($item));

        return $item;
    }

}
