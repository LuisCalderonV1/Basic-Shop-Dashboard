@extends('layouts.frontend')
@section('content')
<div>
    <h2>Shipping Address</h2>
</div>
<form method="POST" action="{{route('frontend.checkout.store_address')}}">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name">
      @error('name')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">Lastname</label>
      <input type="text" class="form-control" id="lastname" name="lastname">
      @error('lastname')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Cellphone</label>
      <input type="text" class="form-control" id="phone" name="phone">
      @error('phone')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="street">Street</label>
      <input type="text" class="form-control" id="street" name="street">
      @error('street')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inumber">Internal Number</label>
      <input type="text" class="form-control" id="inumber" name="inumber">
      @error('inumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="enumber">External Number</label>
      <input type="text" class="form-control" id="enumber" name="enumber">
      @error('enumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city">
      @error('city')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" class="form-control" name="state">
        <option selected>Choose...</option>
        <option>...</option>
      </select>
      @error('state')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="suburb">Suburb</label>
      <input type="text" class="form-control" id="suburb" name="suburb">
      @error('suburb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" name="zip">
      @error('zip')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="phone2">Other phone</label>
      <input type="text" class="form-control" id="phone2" placeholder="Optional" name="phone2">
      @error('phone2')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="instructions">Other Instructions</label>
    <input type="text" class="form-control" id="instructions" placeholder="Apartment, studio, or floor" name="instructions">
    @error('instructions')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <div class="row py-4">
      <div class="col-12 col-md-4">
          <h2 class="mb-3">Resume</h2>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h4 text-muted">Subtotal:</p>
              </div>
              <div class="col-6">
                  <p class="h4 text-muted"><b>$4,990</b></p>
              </div>
          </div>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h4 text-muted">Shipping:</p>
              </div>
              <div class="col-6">
                  <p class="h4 text-muted"><b>$190</b></p>
              </div>
          </div>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h4">Total:</p>
              </div>
              <div class="col-6">
                  <p class="h4 text-danger"><b>$5,990</b></p>
              </div>
          </div>
      </div>
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><b>Finalize & Pay</b></button>
</form>
@endsection