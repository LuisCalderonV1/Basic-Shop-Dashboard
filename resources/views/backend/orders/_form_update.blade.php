<form method="post"  action="{{ route('orders.update', $order->id) }}">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name"  value="{{$order->user->name}}" readonly>
    </div>
  <div class="form-group">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname"  value="{{$order->user->lastname}}" readonly>
  </div>
  <div class="form-group">
    <label for="subtotal">Subtotal</label>
    <input type="text" class="form-control" id="subtotal" name="subtotal"  value="{{$order->subtotal}}">
  </div>
  <div class="form-group">
    <label for="shipping">Shipping</label>
    <input type="text" class="form-control" id="shipping" name="shipping"  value="{{$order->shipping}}">
  </div>
  <div class="form-group">
    <label for="total">Total</label>
    <input type="text" class="form-control" id="total" name="total"  value="{{$order->total}}">
  </div>
  <div class="form-group">
    <label for="payment_status">Payment</label>
    <input type="text" class="form-control" id="payment_status" name="payment_status"  value="{{$order->payment_status}}">
  </div>
  <div class="form-group">
    <label for="general_status">Status</label>
    <input type="text" class="form-control" id="general_status" name="general_status"  value="{{$order->general_status}}">
  </div>
  <div class="form-group">
    <label for="created_at">Created</label>
    <input type="text" class="form-control" id="created_at" name="created_at"  value="{{$order->created_at}}" readonly>
  </div>
  <div class="form-group">
    <label for="updated_at">Updated</label>
    <input type="text" class="form-control" id="updated_at" name="updated_at"  value="{{$order->updated_at}}" readonly>
  </div>
<div class="mb-5">
  <a href="{{route('orders.index')}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
@include('backend.orders._shipping') 
@include('backend.orders.order_content') 

