<form method="POST" action="{{route('frontend.checkout.update_address', $user->address->id)}}">
  @csrf
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
      <input type="text" class="form-control" id="phone" name="phone" maxlength="10" value="{{$user->address->phone}}">
      @error('phone')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="street">Street</label>
      <input type="text" class="form-control" id="street" name="street" value="{{$user->address->street}}">
      @error('street')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="inumber">Internal Number</label>
      <input type="text" class="form-control" id="inumber" name="inumber" value="{{$user->address->inmuber}}">
      @error('inumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="enumber">External Number</label>
      <input type="text" class="form-control" id="enumber" name="enumber" value="{{$user->address->enumber}}">
      @error('enumber')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="city">City</label>
      <input type="text" class="form-control" id="city" name="city" value="{{$user->address->city}}">
      @error('city')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="state">State</label>
      <select id="state" class="form-control" name="state">
        <option></option>
        @foreach($states as $state)
        <option value="{{$state}}" {{$user->address->state == $state ? 'selected' : '' }}>{{$state}}</option>
        @endforeach
      </select>
      @error('state')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="suburb">Suburb</label>
      <input type="text" class="form-control" id="suburb" name="suburb" value="{{$user->address->suburb}}">
      @error('suburb')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="zip">Zip</label>
      <input type="text" class="form-control" id="zip" name="zip" value="{{$user->address->zip}}" maxlength="10">
      @error('zip')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
    <div class="form-group col-md-4">
      <label for="phone2">Other phone</label>
      <input type="text" class="form-control" id="phone2" placeholder="Optional" name="phone2" value="{{$user->address->phone2}}">
      @error('phone2')
      <span class="text-danger">{{ $message }}</span>
      @enderror
    </div>
  </div>
  <div class="form-group">
    <label for="instructions">Other Instructions</label>
    <input type="text" class="form-control" id="instructions" placeholder="Apartment, studio, or floor" name="instructions" value="{{$user->address->instructions}}">
    @error('instructions')
      <span class="text-danger">{{ $message }}</span>
      @enderror
  </div>
  <button type="submit" class="btn btn-warning btn-lg"><b>Save</b></button>
</form>