<?php


namespace App\Helpers;


use App\Models\CheckOut\CheckOut;
use App\Models\Payments\PaymentPayu;
use App\Models\Products\Product;
use GuzzleHttp\Client;

class PayU
{

    public static function auth()
    {
        $endpoint = 'https://secure.snd.payu.com/pl/standard/user/oauth/authorize';
        $client = new Client();
        $response = $client->request('GET', $endpoint, ['query' => [
            'grant_type' => 'client_credentials',
            'pos_id' => 377814,
            'MD5' => 'cec7f96ee87b4457621da7bae8049ca1',
            'client_id' => 377814,
            'client_secret' => '9f452ecfba439d6958136de2bd88565e',
        ]]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        $content = json_decode($content);

        return $content->access_token;
    }

    public static function payment($id)
    {
        $item = CheckOut::find($id);

        $endpoint = config('app.payu.endpoint');
        $merchantPosId = config('app.payu.merchantPosId');
        $description = config('app.payu.description');
        $currencyCode = config('app.payu.currencyCode');
        $customerIp = config('app.payu.customerIp');
        $redirectTo = route('payment.status', ['_token' => $item->_token]);
        $totalAmount = $item->total_price * 100;

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
        \"notifyUrl\": \"$redirectTo\",
        \"customerIp\": \"$customerIp\",
        \"merchantPosId\": \"$merchantPosId\",
        \"description\": \"$description\",
        \"currencyCode\": \"$currencyCode\",
        \"totalAmount\": \"$totalAmount\",
        \"products\": [
        {
        \"name\": \"Wireless mouse\",
        \"unitPrice\": \"15000\",
        \"quantity\": \"1\"
        },
        {
        \"name\": \"HDMI cable\",
        \"unitPrice\": \"6000\",
        \"quantity\": \"1\"
        }
        ]
        }");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json",
            "Authorization: Bearer ".self::auth()
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($response);

        if ($response->status->statusCode == 'SUCCESS')
        {
            $data_payment = [];
            $data_payment['order_token'] = $item->_token;
            $data_payment['order_id'] = $response->orderId;
            PaymentPayu::create($data_payment);

            return redirect(url($response->redirectUri));
        }

    }

    public static function status($_token)
    {
        $order = PaymentPayu::where('_token', $_token)
            ->first();

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://secure.snd.payu.com/api/v2_1/orders/$order->order_id");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer 3e5cac39-7e38-4139-8fd6-30adc06a61bd"
        ));

        $response = curl_exec($ch);
        curl_close($ch);

        dd($response);

    }

}
