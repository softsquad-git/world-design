<?php


namespace App\Services\Admin\References;


use App\Helpers\Status;

class ReferenceService
{

    public function delete($item)
    {
        $item->delete();

        return true;
    }

    public function update($item)
    {
        $item->update([
            'status' => Status::REFERENCE_STATUS_ACCEPT
        ]);

        return $item;

    }

}
