@extends('layouts.frontend')
@section('content')
<h2>Thanks!</h2>
<hr>
<p>Your order #{{$order->id}} was completed successfully!</p>
<p>Thanks for your purchase. An order confirmation email has been sent. We will process your order shortly.</p>    
<p>Order Total: ${{number_format($order->total)}}</p>
@endsection