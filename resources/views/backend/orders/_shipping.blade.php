<div>
    <h2>Shipping Address</h2>
</div>
<div class="p-4 bg-light mb-4 d-flex justify-content-start">
    <div class="p-5">
    <p class="h3"><i class="fas fa-check"></i></p>
    </div>
    <div>
      <h5>{{$order->user->name . " " . $order->user->lastname}}</h5>
      <p class="mb-0">{{$order->user->address->street . " " . $order->user->address->inumber .  " " . $order->user->address->enumber }}</p>
      <p class="mb-0">{{$order->user->address->suburb . ", " . $order->user->address->zip .  ", " . $order->user->address->city .  ", " . $order->user->address->state }}</p>
      <p >Tel: {{$order->user->address->phone}}</p>
    </div>
</div>