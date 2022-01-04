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
        $categories = Category::all();
        $uid = $this->checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();  
        return view('frontend.cart.index', ['itemsInCart' => $itemsInCart, 'categories' => $categories]);
    }

    /**
     * Store a item in cart.
     */
    public function store($id)
    {
        $uid = $this->checkUID();

        
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
        $uid = $this->checkUID();
        $item = Cart::find($id);
        $item->delete();

        return redirect('shopping-cart')->withStatus('Data Has Been deleted');
    }

    protected function checkUID()
    {
        if(isset($_COOKIE['_shop_cart_session']) && (strlen($_COOKIE['_shop_cart_session']) === 32) ){
            $uid = $_COOKIE['_shop_cart_session'];
        }
        else {
            $uid = openssl_random_pseudo_bytes(16);
            $uid = bin2hex($uid);
        }

        setcookie('_shop_cart_session', $uid, time()+(60*60*24*30));
        return $uid;
    }
}