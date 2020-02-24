<?php


namespace App\Repositories\Admin\References;


use App\Helpers\Status;
use App\Models\References\Reference;

class ReferenceRepository
{

    public function items()
    {
        $items = Reference::where('status', '!=', Status::REFERENCE_STATUS_NEW)
            ->orderBy('id', 'DESC')
            ->paginate(20);

        return $items;
    }

    public function find($id)
    {
        $item = Reference::find($id);

        return $item;
    }

}
