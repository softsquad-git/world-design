<?php

namespace App\Services\Front\References;

use App\Helpers\Status;
use App\Models\References\Reference;
use Illuminate\Support\Str;

class ReferenceService
{

    public static function store($email)
    {
        $item = Reference::create([
            'name' => '',
            'reference' => '',
            'token' => Str::random(32),
            'accept' => Status::REFERENCE_STATUS_NEW
        ]);

        return $item;
    }

    public function update(array $data, $item)
    {
        $data['status'] = Status::REFERENCE_STATUS_MODIFY;
        $item->update($data);

        return $item;
    }

}
