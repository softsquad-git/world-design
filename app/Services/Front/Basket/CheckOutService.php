<?php


namespace App\Services\Front\Basket;


use App\Helpers\AdminContact;
use App\Helpers\Status;
use App\Mail\User\SuccessCheckOut;
use App\Models\Basket\Basket;
use App\Models\CheckOut\CheckOut;
use App\Models\Products\Product;
use App\Services\Front\References\ReferenceService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutService
{

    public function store(array $data)
    {
        $shipment = 0;
        $product_ids = [];
        if (Auth::check()) {
            $data['user_id'] = Auth::id();
            $items = Basket::where('user_id', Auth::id())
                ->get();
            $total_price = 0;

            foreach ($items as $item) {
                $product = Product::find($item->product_id);
                $quantity = $product->quantity - $item->quantity;
                $status = $product->status;
                if ($quantity <= 0) {
                    $quantity = 0;
                    $status = Status::PRODUCT_STATUS_LACK;
                }
                $product->update([
                    'quantity' => $quantity,
                    'status' => $status
                ]);
                $total_price += $item->product->price * $item->quantity;
                $data['quantity'] = $item->quantity;
                $product_ids[] = $item->product_id;

                $data['size'] = $item->size;
            }

            $total_price = $total_price + $shipment;

            $data['total_price'] = $total_price;
            $data['product_ids'] = json_encode($product_ids);
        }

        $data['shipment'] = $shipment;
        $data['status'] = Status::CHECKOUT_STATUS_SUBMITTED;

        $item = CheckOut::create($data);

        ReferenceService::store($item->email);
        //Mail::to($item->email)->send(new SuccessCheckOut($item));
        //AdminContact::buyProduct();

        return $item;
    }

}
