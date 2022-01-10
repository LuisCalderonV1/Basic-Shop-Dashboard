<?php use Illuminate\Support\Facades\Auth; ?>
@extends('layouts.frontend')
@section('content')
<div>
    <h2>Shipping Address</h2>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('frontend.checkout.store_order')}}">
  @csrf
  @if(!Auth::user()->address)
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="name">Name</label>
      <input type="text" class="form-control" id="name" name="name" readonly value="{{Auth::user()->name}}">
      @error('name')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="lastname">Lastname</label>
      <input type="text" class="form-control" id="lastname" name="lastname" readonly value="{{Auth::user()->lastname}}">
      @error('lastname')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="phone">Cellphone</label>
      <input type="text" class="form-control" id="phone" name="phone" maxlength="10" value="{{old('phone')}}">
      @error('phone')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="street">Street</label>
      <input type="text" class="form-control" id="street" name="street" value="{{old('street')}}">
      @error('street')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inumber">Internal Number</label>
      <input type="text" class="form-control" id="inumber" name="inumber" value="{{old('inumber')}}">
      @error('inumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="enumber">External Number</label>
      <input type="text" class="form-control" id="enumber" name="enumber" value="{{old('enumber')}}">
      @error('enumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
      @error('city')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" class="form-control" name="state" value="{{old('state')}}">
        <option selected>Choose...</option>
        <option>Quintana Roo</option>
      </select>
      @error('state')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="suburb">Suburb</label>
      <input type="text" class="form-control" id="suburb" name="suburb" value="{{old('suburb')}}">
      @error('suburb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" name="zip" value="{{old('zip')}}">
      @error('zip')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="phone2">Other phone</label>
      <input type="text" class="form-control" id="phone2" placeholder="Optional" name="phone2" value="{{old('phone2')}}">
      @error('phone2')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="instructions">Other Instructions</label>
    <input type="text" class="form-control" id="instructions" placeholder="Apartment, studio, or floor" name="instructions" value="{{old('instructions')}}">
    @error('instructions')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  @else
  <div class="p-4 bg-light mb-4 d-flex justify-content-start">
    <div class="p-5">
    <p class="h3"><i class="fas fa-check"></i></p>
    </div>
    <div>
      <h5>{{Auth::user()->name . " " . Auth::user()->lastname}}</h5>
      <p class="mb-0">{{Auth::user()->address->street . " " . Auth::user()->address->inumber .  " " . Auth::user()->address->enumber }}</p>
      <p class="mb-0">{{Auth::user()->address->suburb . ", " . Auth::user()->address->zip .  ", " . Auth::user()->address->city .  ", " . Auth::user()->address->state }}</p>
      <p >Tel: {{Auth::user()->address->phone}}</p>
      <a href="" class="btn btn-outline-dark">Change address</a>
    </div>
  </div>
  @endif
  <div class="row py-4">
      <div class="col-12 col-md-4">
          <h2 class="mb-3">Resume</h2>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h5 text-muted">Subtotal:</p>
              </div>
              <div class="col-6">
                  <p class="h5 text-muted"><b>${{number_format($subtotal)}}</b></p>
              </div>
          </div>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h5 text-muted">Shipping:</p>
              </div>
              <div class="col-6">
                  <p class="h5 text-muted"><b>${{number_format($shippingPrice)}}</b></p>
              </div>
          </div>
          <div class="row py-1 border-bottom">
              <div class="col-6">
                  <p class="h5">Total:</p>
              </div>
              <div class="col-6">
                  <p class="h5 text-danger"><b>${{number_format($total)}}</b></p>
              </div>
          </div>
      </div>
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><b>Finalize & Pay</b></button>
</form>
@endsection