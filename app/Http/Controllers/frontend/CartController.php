<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware(['check.stocks'])->only('index');
    }
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
     * Store an item in cart.
     */
    public function store($id)
    {
        $response = $this->save($id);
        extract($response);
        $totalCartItems = getItemsInCart();

        if($result){
            return redirect('shopping-cart')->withStatus('Data Has Been inserted');
        }
        else{
            return redirect()->back()->withStatus('Insuficient inventory, ' . $stock . ' in stock');
        }
    }

    public function ajaxStore(Request $request)
    {
        $id = sanitize($request->product_id);
        $response = $this->save($id);
        extract($response);
        $totalCartItems = getItemsInCart();
        
        if($result){
            $status = 'Product added to the cart';
        }        
        else{
            $status = 'Insuficient inventory, ' . $stock . ' in stock';
        }
        
        return response()->json(['status'=>$status, 'totalCartItems' => $totalCartItems]);
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

    private function save($id)
    {
        $uid = checkUID();
        $product = Product::findOrFail($id);
        $stock = $product->stock->quantity;
        $cart = Cart::where('uid', '=', $uid)->where('product_id', '=', $id)->first(); 
        
        //fet qty in cart
        if($cart){
            $qtyInCart = $cart->quantity;
        }
        else{
            $qtyInCart = 0;
        }

        //if there is enough stock of item add to cart
        if($stock > $qtyInCart){
            if(empty($cart))
            {
                //create new one
                $cart = New Cart;
                $cart->uid = $uid;
                $cart->product_id = $id;
                $cart->quantity = 1;
            }
            else
            {
                //update existing
                $cart->quantity += 1;
            }
            $cart->save();
            $response['result'] = true;
        }
        else{
            $response['result'] = false;
        }

        $response['stock'] = $stock;
        return $response;
    }
}
