<?php

namespace App\Helpers;

use App\Models\Shipments\ShipmentPrice;

class Shipment
{

    public static function price($shipment)
    {
        $shipment_price = ShipmentPrice::find(5);
        $_shipment = 0;
        switch ($shipment){
            case 'dpd_classic';
                $_shipment = $shipment_price->dpd_classic ?? config('app.shipment.dpd_classic');
                break;
            case 'dpd_download';
                $_shipment = $shipment_price->dpd_cownload ?? config('app.shipment.dpd_download');
                break;
            case 'inpost_classic';
                $_shipment = $shipment_price->inpost_classic ?? config('app.shipment.inpost_classic');
                break;
            case 'inpost_download';
                $_shipment = $shipment_price->inpost_download ?? config('app.shipment.inpost_download');
                break;
        }

        return $_shipment;
    }

}
