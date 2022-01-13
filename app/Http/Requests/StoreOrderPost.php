<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderPost extends FormRequest
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
            'phone' => 'sometimes|required|numeric|digits:10',
            'street' => 'sometimes|required|max:100|string',
            'enumber' => 'sometimes|required|string|max:10',
            'inumber' => 'sometimes|nullable|string|max:10',
            'city' => 'sometimes|required|max:30|string',
            'state' => 'sometimes|required|max:30|string',
            'suburb' => 'sometimes|required|max:30|string',
            'zip' => 'sometimes|numeric|required|digits_between:3,10',
            'phone2' => 'sometimes|nullable|numeric|digits_between:10,10',
            'instructions' => 'sometimes|nullable|max:100|alpha_num',
        ];
    }
}
