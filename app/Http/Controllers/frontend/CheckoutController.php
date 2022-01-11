<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Order;
use App\Address;
use App\Category;
use App\OrderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreOrderPost;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.cart'])->except('success');
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
        
        if(!Auth::user()->address){
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
            }
        }

        //get totals from cart
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
        $order->public_key = $this->generateRandomString();
        $order->save();

        //save items in order contents table
        $uid = checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();

        foreach($itemsInCart as $itemInCart){
            $item = new OrderContent;
            $item->order_id = $order->id;
            $item->product_id = $itemInCart->product_id;
            $item->quantity = $itemInCart->quantity;
            $item->price_per = $itemInCart->product->price;
            $item->discount = $itemInCart->product->discount;

            $item->save();
        }
        
        //delete items in cart
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->delete();
       
        return redirect()->route('frontend.order_success', ['order_id'=> $order->id, 'public_key' => $order->public_key]);
    }

    /**
     * Show the success order page
     */
    public function success($order_id, $public_key)
    {
        $order = Order::where('id', '=', $order_id)->where('public_key', '=', $public_key)->first();
        if($order){
            $orderContent = orderContent::where('order_id', '=', $order->id)->orderBy('created_at', 'desc')->get();
            return view('frontend.checkout.order-success',['order' => $order, 'orderContent' => $orderContent]);
        }
        else{
            abort(404, 'Not Found');
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

    protected function generateRandomString($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
