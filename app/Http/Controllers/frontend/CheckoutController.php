<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Order;
use App\Address;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderPost;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.cart']);
    }
    const PAYMENT_STATUS = "Pending";
    const GENERAL_STATUS = "Pending";
    const SHIPPING_PRICE = 190;

    /**
     * Show the form to store the shipping address
     */
    public function createOrder()
    {
        $prices = $this->getPrices();
        extract($prices);

        return view('frontend.checkout.shipping',
        [
            'subtotal' => $subtotal, 
            'shippingPrice' => self::SHIPPING_PRICE,
            'total' => $total,
        ]);
    }

    /**
     * Create an order and store shipping address
     */

    public function storeOrder(StoreOrderPost $request)
    {
        $validated = $request->validated();

        if($validated){
            //save address
            $address = new Address;
            $address->user_id = Auth::id();
            $address->phone = $request->phone;
            $address->street = $request->street;
            $address->enumber = $request->enumber;
            $address->inumber = $request->inumber;
            $address->city = $request->city;
            $address->state = $request->state;
            $address->suburb = $request->suburb;
            $address->zip = $request->zip;
            $address->phone2 = $request->phone2;
            $address->instructions = $request->instructions;
            $address->save();

            $prices = $this->getPrices();
            extract($prices);

            //create an order
            $order = new Order;
            $order->user_id = auth()->user()->id;
            $order->subtotal = $subtotal;
            $order->shipping = self::SHIPPING_PRICE;
            $order->total = $total;
            $order->payment_status = self::PAYMENT_STATUS;
            $order->general_status = self::GENERAL_STATUS;
            $order->save();

            //delete items in cart
            $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->delete();
            return redirect('/order_success');
        }
    }

    /**
    * retrieve items in cart and totals
    */
    private function getPrices(){            
        $uid = checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();  
        
        $subtotal = 0;
        foreach($itemsInCart as $item){
            $finalPrice = getFinalPrice($item);
            $totalByItem = getTotalByItem($item, $finalPrice);
            $subtotal = getSubtotal($subtotal,$totalByItem);
        }
            
        $total = $subtotal +  self::SHIPPING_PRICE;

        return $prices= ['subtotal' => $subtotal, 'total' => $total];
    }   
}
