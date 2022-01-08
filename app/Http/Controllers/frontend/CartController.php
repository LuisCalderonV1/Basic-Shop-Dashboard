<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    /**
     * Show all the items inside shopping cart
     */
    public function index()
    {
        $uid = checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();  
        return view('frontend.cart.index', ['itemsInCart' => $itemsInCart]);
    }

    /**
     * Store a item in cart.
     */
    public function store($id)
    {
        $uid = checkUID();

        
        $cart = Cart::where('uid', '=', $uid)->where('product_id', '=', $id)->first(); 
        
        if(empty($cart))
        {
            $cart = New Cart;
            $cart->uid = $uid;
            $cart->product_id = $id;
            $cart->quantity = 1;
        }
        else
        {
            $cart->quantity += 1;
        }
        

        $cart->save();
        return redirect('shopping-cart')->withStatus('Data Has Been inserted');
    }
    
    /**
     * Delete one item from shopping cart
     */
    public function destroy($id)
    {
        $uid = checkUID();
        $item = Cart::find($id);
        $item->delete();

        return redirect('shopping-cart')->withStatus('Data Has Been deleted');
    }
}
