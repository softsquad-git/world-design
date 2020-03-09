<?php


namespace App\Services\Admin\CheckOuts;


class CheckOutService
{

    public function changeStatus($status, $item)
    {
        $item->update([
            'status' => $status
        ]);

        return $item;
    }

}
