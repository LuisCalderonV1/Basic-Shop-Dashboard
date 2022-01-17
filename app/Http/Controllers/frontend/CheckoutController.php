<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\User;
use App\Order;
use App\Address;
use App\Product;
use App\Category;
use App\OrderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressPost;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'check.cart', 'check.stocks'])->except('success');
        $this->middleware(['check.address'])->only('createOrder' ,'storeOrder');
    }
    const PAYMENT_STATUS = "Pending";
    const GENERAL_STATUS = "Pending";
    const SHIPPING_PRICE = 190;

    /**
     * Show the view for checkout process
     */
    public function createOrder()
    {
        $prices = $this->getPrices();
        extract($prices);

        return view('frontend.checkout.create_order',
        [
            'subtotal' => $subtotal, 
            'shippingPrice' => self::SHIPPING_PRICE,
            'total' => $total,
        ]);
    }

    /**
     * Create an order 
     */

    public function storeOrder()
    {
       
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

        //get items in cart
        $uid = checkUID();
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();

        //if enough stocks of all products
        foreach($itemsInCart as $itemInCart){
            //decrese stocks
            $product = Product::find($itemInCart->product_id);
            $stock = $product->stock;
            $stock->quantity -= $itemInCart->quantity;
            $stock->save();
            

            $price = $itemInCart->product->price;
            $discount = $itemInCart->product->discount;
            $discountInMoney = ($price * $discount) / 100;
            
            //save items in order contents table
            $item = new OrderContent;
            $item->order_id = $order->id;
            $item->product_id = $itemInCart->product_id;
            $item->quantity = $itemInCart->quantity;
            $item->price_per = $price;
            $item->discount = $discount;
            $item->final_price = $price - $discountInMoney;
            $item->save();
        }
        //delete items in cart
        $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->delete();           
        return redirect()->route('frontend.order_success', ['order_id'=> $order->id, 'public_key' => $order->public_key]);
    }

    /**
     * Show the form to store the shipping address
     */
    public function createAddress()
    {
        $prices = $this->getPrices();
        extract($prices);

        return view('frontend.checkout.create_address', ['subtotal' => $subtotal, 'shippingPrice' => self::SHIPPING_PRICE,
            'total' => $total]);
        
    }

    public function storeAddress(StoreAddressPost $request)
    {
        $validated = $request->validated();
        if($validated){
            $address = new Address;
            $address->user_id = Auth::id();
            $address->phone = sanitize($request->phone);
            $address->street = sanitize($request->street);
            $address->enumber = sanitize($request->enumber);
            $address->inumber = sanitize($request->inumber);
            $address->city = sanitize($request->city);
            $address->state = sanitize($request->state);
            $address->suburb = sanitize($request->suburb);
            $address->zip =sanitize($request->zip);
            $address->phone2 = sanitize($request->phone2);
            $address->instructions = sanitize($request->instructions);
            $address->save();

            return redirect()->route('frontend.checkout.create_order');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function editAddress($user_id)
    {
        $user = User::findOrFail($user_id);
        return view('frontend.checkout.update_address', ['user' => $user]);
    }

    /**
     * Update the specified resource.
     *
     */
    public function updateAddress(StoreAddressPost $request, $addressId)
    {
        $validated = $request->validated();
        if($validated){
            $address = Address::findOrFail($addressId);
            $address->phone = sanitize($request->phone);
            $address->street = sanitize($request->street);
            $address->enumber = sanitize($request->enumber);
            $address->inumber = sanitize($request->inumber);
            $address->city = sanitize($request->city);
            $address->state = sanitize($request->state);
            $address->suburb = sanitize($request->suburb);
            $address->zip =sanitize($request->zip);
            $address->phone2 = sanitize($request->phone2);
            $address->instructions = sanitize($request->instructions);
            $address->save();

            return redirect()->route('frontend.checkout.create_order');
        }
    }
    /**
     * Show the success order page
     */
    public function success($order_id, $public_key)
    {
        $order = Order::where('id', '=', $order_id)->where('public_key', '=', $public_key)->first();
        if($order){
            $orderContent = orderContent::where('order_id', '=', $order->id)->orderBy('created_at', 'desc')->get();
            return view('frontend.checkout.order_success',['order' => $order, 'orderContent' => $orderContent]);
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
    /**
    * generate public key
    */
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
