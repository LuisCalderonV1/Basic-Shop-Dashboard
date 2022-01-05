<?php

namespace App\Http\Controllers\frontend;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    /**
     * Show the form to store the shipping address
     */
    public function createAddress()
    {
        $categories = Category::all();
        return view('frontend.checkout.shipping',['categories' => $categories]);
    }

    public function storeAddress(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|alpha',
            'lastname' => 'required|max:100|alpha',
            'phone' => 'required|numeric|digits_between:min=10,max=10',
            'street' => 'required|max:100|alpha_num',
            'enumber' => 'required|alpha_num',
            'inumber' => 'alpha_num',
            'city' => 'required|max:30|alpha',
            'state' => 'required|max:30|alpha',
            'suburb' => 'required|max:30|alpha',
            'zip' => 'numeric|required|digits_between:min=3,max=10',
            'phone2' => 'numeric|digits_between:min=10,max=10',
            'instructions' => 'max:100|alpha_num',
        ]);

    }
}
