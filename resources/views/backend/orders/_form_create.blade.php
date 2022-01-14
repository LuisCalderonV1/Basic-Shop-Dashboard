<form method="post"  action="{{ route('orders.store') }}">
    @csrf
  <div class="form-group col-md-4">
      <label for="user">User</label>
      <select id="user" class="form-control" name="user">
        <option></option>
        @foreach($users as $user)
        <option value="" {{$selected = old('user') == '' ? 'selected' : '' }}></option>
        @endforeach
      </select>
      @error('state')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="form-group">
    <label for="subtotal">Subtotal</label>
    <input type="text" class="form-control" id="subtotal" name="subtotal"  value="{{old('subtototal')}}">
  </div>
  <div class="form-group">
    <label for="shipping">Shipping</label>
    <input type="text" class="form-control" id="shipping" name="shipping"  value="{{old('shipping')}}">
  </div>
  <div class="form-group">
    <label for="total">Total</label>
    <input type="text" class="form-control" id="total" name="total"  value="{{old('total')}}">
  </div>
  <div class="form-group">
    <label for="payment_status">Payment</label>
    <input type="text" class="form-control" id="payment_status" name="payment_status"  value="{{old('payment_status')}}">
  </div>
  <div class="form-group">
    <label for="general_status">Status</label>
    <input type="text" class="form-control" id="general_status" name="general_status"  value="{{old('general_status')}">
  </div>
  <a href="{{route('orders.index')}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
