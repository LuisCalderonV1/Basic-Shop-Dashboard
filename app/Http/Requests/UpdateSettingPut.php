<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingPut extends FormRequest
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
        return [
            'store_name' => 'required|max:100|string',
            'store_mail'=> 'required|max:100|string',
            'store_address' => 'required|max:255|string',
            'store_phone' => 'required|numeric|digits:10',
            'currency_code' => 'required|string|max:3',
            'shipping_cost' => 'required|numeric|digits_between:1,5',
            'banner_image' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
