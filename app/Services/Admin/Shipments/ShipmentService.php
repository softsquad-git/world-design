<?php


namespace App\Services\Admin\Shipments;


use App\Models\Shipments\ShipmentPrice;

class ShipmentService
{

    public function shipment()
    {
        $shipment = ShipmentPrice::first();
        if (isset($shipment->id))
            return $shipment;

        return new ShipmentPrice();
    }

    public function store(array $data)
    {
        $item = $this->shipment();
        if (isset($item->id))
            return $item->update($data);

        return ShipmentPrice::create($data);
    }

}
