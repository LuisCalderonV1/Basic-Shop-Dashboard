@extends('layouts.frontend')
@section('content')
<h2>Thanks!</h2>
<hr>
<p>Your order #{{$order->id}} was completed successfully!</p>
<p>Thanks for your purchase. An order confirmation email has been sent. We will process your order shortly.</p>    
@foreach ($orderContent as $item)
    <p>{{$item->quantity}} {{$item->product->name}} x ${{number_format($item->final_price)}}</p>
@endforeach
<p class="mb-0">Subtotal: <b>${{number_format($order->subtotal)}}</b></p>
<p class="mb-0">Shipping: <b>${{number_format($order->shipping)}}</b></p>
<p>Order Total: <b>${{number_format($order->total)}} {{getSettings('currency_code')['value']}}</b></p>
@endsection