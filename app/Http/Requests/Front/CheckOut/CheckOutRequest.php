<?php

namespace App\Http\Requests\Front\CheckOut;

use Illuminate\Foundation\Http\FormRequest;

class CheckOutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3',
            'post_code' => 'required|string',
            'city' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'email' => 'required|email',
            'shipment' => 'required',
            'country' => 'required|min:3|string'
        ];
    }
}
