<?php

namespace App\Http\Requests\Admin\Products;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = [];
        $data['title'] = 'required|min:3|string';
        $data['category_id'] = 'required|integer';
        $data['price'] = 'required';
        $data['description'] = 'required|min:10';
        $data['content'] = 'required|min:50';
        if ($this->get('item') > 0){
            $data['sizes'] = 'array|nullable';
        }else{
            $data['sizes'] = 'array|required';
        }
        $data['quantity'] = 'required|numeric';
        $data['availability'] = 'required|integer';
        if ($this->get('is_promo') == 1){
            $data['old_price'] = 'required';
        }else{
            $data['old_price'] = 'nullable';
            $data['is_news'] = 'nullable';
        }

        return $data;
    }
}
