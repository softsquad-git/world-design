<?php


namespace App\Repositories\Front\References;


use App\Helpers\Status;
use App\Models\References\Reference;
use App\Services\Front\References\ReferenceService;

class ReferenceRepository
{

    public function items()
    {
        $items = Reference::where('status', Status::REFERENCE_STATUS_ACCEPT)
            ->orderBy('id', 'DESC')
            ->get();

        return $items;
    }

    public function find($token)
    {
        $item = Reference::where('token', $token)
            ->first();

        return $item;
    }

}
