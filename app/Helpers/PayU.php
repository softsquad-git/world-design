<?php

namespace App\Helpers;

use App\Mail\User\SuccessPayment;
use App\Models\CheckOut\CheckOut;
use App\Models\Payments\PaymentPayu;
use Illuminate\Support\Facades\Mail;
use MongoDB\Driver\Session;
use OpenPayU_Configuration;
use OpenPayU_Order;
use OpenPayU_Util;

class PayU
{

    public static function status($_token)
    {
        $order = CheckOut::where('_token', $_token)
            ->first();
        if (isset($order->id) && $order->id > 0) {
            $order->update([
                'status' => Status::CHECKOUT_STATUS_ACCEPTED
            ]);
            $payment = PaymentPayu::where('order_token', $order->_token)
                ->first();
            $payment
                ->delete();

            Mail::to($order->email)->send(new SuccessPayment());
            return redirect()->route('home')
                ->with('message', trans('front.payu.success'));
        }

        return redirect()->route('home')
            ->with('message', trans('front.payu.error'));

    }

    public static function payment($id)
    {
        $item = CheckOut::find($id);
        $order = [];
        $order['notifyUrl'] = route('payment.check');
        $order['continueUrl'] = route('payment.status', ['_token' => $item->_token]);
        $order['customerIp'] = '127.0.0.1';
        $order['merchantPosId'] = OpenPayU_Configuration::getOauthClientId() ? OpenPayU_Configuration::getOauthClientId() : OpenPayU_Configuration::getMerchantPosId();
        $order['description'] = 'New Order';
        $order['currencyCode'] = 'PLN';
        $order['totalAmount'] = $item->total_price * 100;
        $order['extOrderId'] = uniqid('', true);

        $order['products'][0]['name'] = 'Product 1';
        $order['products'][0]['unitPrice'] = 1000;
        $order['products'][0]['quantity'] = 1;

        $order['buyer']['email'] = $item->email;
        $order['buyer']['phone'] = $item->phone;
        $order['buyer']['firstName'] = $item->name;
        $order['buyer']['language'] = 'en';

        $response = OpenPayU_Order::create($order);
        $status_desc = OpenPayU_Util::statusDesc($response->getStatus());
        if ($response->getStatus() == 'SUCCESS') {
            $data_payment = [];
            $data_payment['order_token'] = $item->_token;
            $data_payment['order_id'] = $response->getResponse()->orderId;
            PaymentPayu::create($data_payment);

            return redirect($response->getResponse()->redirectUri);
        }
        return redirect()->route('home')
            ->with('message', trans('front.payu.error.payment'));
    }

    public static function checkPayment()
    {
        $response = OpenPayU_Order::retrieveTransaction('5e5f87dbccac60.52705567');
        dd($response);
    }

}
