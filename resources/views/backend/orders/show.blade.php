@extends('layouts.backend')
@section('content')
<h2>View order</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<form class="mb-5">
    <div class="form-group">
      <label for="user">User</label>
      <input type="text" class="form-control" id="name" name="name" readonly value="{{$order->user->name . ' ' . $order->user->lastname}}">
    </div>
  <div class="form-group">
    <label for="subtotal">Subtotal</label>
    <input type="text" class="form-control" id="subtotal" name="subtotal" readonly value="{{$order->subtotal}}">
  </div>
  <div class="form-group">
    <label for="shipping">Shipping</label>
    <input type="text" class="form-control" id="shipping" name="shipping" readonly value="{{$order->shipping}}">
  </div>
  <div class="form-group">
    <label for="total">Total</label>
    <input type="text" class="form-control" id="total" name="total" readonly value="{{$order->total}}">
  </div>
  <div class="form-group">
    <label for="payment_status">Payment</label>
    <input type="text" class="form-control" id="payment_status" name="payment_status" readonly value="{{$order->payment_status}}">
  </div>
  <div class="form-group">
    <label for="general_status">Status</label>
    <input type="text" class="form-control" id="general_status" name="general_status" readonly value="{{$order->general_status}}">
  </div>
  <div class="form-group">
    <label for="created_at">Created</label>
    <input type="text" class="form-control" id="created_at" name="created_at" readonly value="{{$order->created_at}}">
  </div>
  <div class="form-group">
    <label for="updated_at">Updated</label>
    <input type="text" class="form-control" id="updated_at" name="updated_at" readonly value="{{$order->updated_at}}">
  </div>
</form>
<h2>Shopping Cart</h2>
<!--table-->
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Total</th>
        </tr>
    </thead>
    <tbody>
    <tr>
    <?php $n=1 ?>
    @foreach($orderContent as $item)
    <th scope="row">{{$n++}}</th>
    <td class="d-flex justify-content-center"><img src="{{url('images') . '/' . $item->product->image}}" style="height:10vh;" alt="..." ></td>
    <td>{{$item->product->name}}</td>
    <td>{{$item->quantity}} pcs</td>
    <td>${{number_format($item->price_per)}}</td>
    <td>{{$item->discount}}%</td>
    <td>${{number_format($item->price_per * $item->quantity)}}</td>
    </tr>
    @endforeach
    <tr>      
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
    </tbody>
    </table>
</div>
<!--/table-->  
{{ $orderContent->links() }}
<a href="{{route('orders.index')}}" class="btn btn-secondary">Back</a>
@endsection