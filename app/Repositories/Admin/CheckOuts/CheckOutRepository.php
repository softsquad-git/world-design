<?php


namespace App\Repositories\Admin\CheckOuts;


use App\Helpers\Status;
use App\Models\CheckOut\CheckOut;

class CheckOutRepository
{

    public function items()
    {
        $items = CheckOut::where('status', '!=', Status::CHECKOUT_STATUS_REALIZATION)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

}
