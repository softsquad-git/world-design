<?php


namespace App\Repositories\Admin\CheckOuts;


use App\Helpers\Status;
use App\Models\CheckOut\CheckOut;
use App\Models\Products\Product;

class CheckOutRepository
{

    public function items()
    {
        $items = CheckOut::where('status', '!=', Status::CHECKOUT_STATUS_REALIZATION)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function realization()
    {
        $items = CheckOut::where('status', Status::CHECKOUT_STATUS_REALIZATION)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        return CheckOut::find($id);
    }

    public function item($id)
    {
        $item = CheckOut::find($id);
        $item->products = Product::whereIn('id', json_decode($item->product_ids))
            ->get();

        return $item;
    }


}
