<?php

namespace App\Http\Middleware;

use Closure;
use App\Cart;
use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

class CheckStocks
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //check stocks
        $uid = checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();
        $troubles = [];

        foreach($itemsInCart as $itemInCart){
            $product = Product::find($itemInCart->product_id);
            $stock = $product->stock;

            if(!$stock->quantity >= $itemInCart->quantity){
                $troubles[] = ['error' =>  'Insuficient inventory of ' . $product->name . '. ' . $stock->quantity . ' in stock']; 
            }
        }

        if(count($troubles)>0){
            Session::flash('troubles', $troubles);
            if(Route::currentRouteName() == 'frontend.checkout.create_order'){
                return redirect()->route('frontend.cart.index');
            }
        }
        
        return $next($request);
    }
}
