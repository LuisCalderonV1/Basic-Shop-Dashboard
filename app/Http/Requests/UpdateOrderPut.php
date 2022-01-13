<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderPut extends FormRequest
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
            'name' => 'required|max:100|string',
            'lastname' => 'required|max:100|string',
            'subtotal' => 'numeric|required|digits_between:3,10',
            'shipping' => 'numeric|required|digits_between:3,10',
            'total' => 'numeric|required|digits_between:3,10',
            'payment_status' => 'required|max:30|string',
            'general_status' => 'required|max:30|string',
        ];
    }
}
