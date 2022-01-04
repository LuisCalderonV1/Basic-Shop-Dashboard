@extends('layouts.frontend')
@section('content')
<!--modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to delete this item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <p id="message-text"></p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('frontend.cart.destroy', 1) }}" method="POST" id="form">   
              @csrf
              @method('DELETE')      
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!--/modal-->
<h2>My Shopping Cart</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
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
        <th scope="col">Total</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    <?php $subtotal = 0; ?>
    @foreach ($itemsInCart as $item)
    <tr>
    <th scope="row">{{$n++}}</th>
    <td class="d-flex justify-content-center"><img src="{{url('images') . '/' . $item->product->image}}" style="height:10vh;" alt="..." ></td>
    <td>{{$item->product->name}}</td>
    <td>{{$item->quantity}} pcs</td>
    <td>
        @if ($item->product->discount > 0)
        <?php $finalPrice = $item->product->price - ($item->product->discount * $item->product->price / 100) ?>
        <span class="mb-0" style="text-decoration: line-through;">${{number_format($item->product->price)}}</span>
        <span class="text-danger"><b>-{{$item->product->discount}}%</b></span>
        <p class="text-danger"><b>${{number_format($finalPrice)}}</b></p>
        @else
        <?php $finalPrice = $item->product->price?>
        <p>${{number_format($item->product->price)}}</p>
        @endif
    </td>
    <td>${{number_format($finalPrice * $item->quantity)}}</td>
    <td>
        <a class="btn btn-info btn-sm" target="_blank" href="{{ route('frontend.products.show',$item->product->id) }}">Show</a>    
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" 
        data-url="{{ route('frontend.cart.destroy',$item->id) }}" data-item="{{ $item->product->name }}">Delete</button>
    </td>
    </tr>
    <?php $subtotal += ($finalPrice * $item->quantity); ?>
    @endforeach
    <tr>
      <td><b>Subtotal: ${{$subtotal}}</b></td>
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
@endsection    
        

