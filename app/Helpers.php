<?php

use App\Cart;

function getFinalPrice($item)
{
    if($item->product->discount > 0){
        $finalPrice = $item->product->price - ($item->product->discount * $item->product->price / 100);
    }
    else{
        $finalPrice = $item->product->price;
    }
    return $finalPrice;
}   

function getTotalByItem($item, $finalPrice){
    $totalByItem = $finalPrice * $item->quantity;
    return $totalByItem;
}

function getSubtotal($totalByItem){
    $subtotal = session('subtotal');
    $subtotal += $totalByItem;
    session(['subtotal' => $subtotal]);

    return $subtotal;
}

function getItemsInCart(){
    $uid = checkUID();
    $itemsInCart = Cart::where('uid', '=', $uid)->orderBy('created_at', 'desc')->get();  
    $totalCartItems=$itemsInCart->count();
    return $totalCartItems;
}

function checkUID(){
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