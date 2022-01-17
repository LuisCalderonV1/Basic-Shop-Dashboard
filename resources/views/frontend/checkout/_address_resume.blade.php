<div class="p-4 bg-light mb-4 d-flex justify-content-start">
    <div class="p-5">
    <p class="h3"><i class="fas fa-check"></i></p>
    </div>
    <div>
      <h5>{{Auth::user()->name . " " . Auth::user()->lastname}}</h5>
      <p class="mb-0">{{Auth::user()->address->street . " " . Auth::user()->address->inumber .  " " . Auth::user()->address->enumber }}</p>
      <p class="mb-0">{{Auth::user()->address->suburb . ", " . Auth::user()->address->zip .  ", " . Auth::user()->address->city .  ", " . Auth::user()->address->state }}</p>
      <p >Tel: {{Auth::user()->address->phone}}</p>
      <a href="{{route('frontend.checkout.edit_address',Auth::user()->id)}}" class="btn btn-outline-dark">Change address</a>
    </div>
  </div>