<?php

namespace App\Http\Requests\Admin\Pages;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
        $data['title'] = 'required|string';
        if ($this->get('item') > 0){
            $data['alias'] = 'required|string';
        }else{
            $data['alias'] = 'required|string|unique:pages';
        }
        $data['content'] = 'required';
        $data['menu_position'] = 'required|integer';

        return $data;
    }
}
