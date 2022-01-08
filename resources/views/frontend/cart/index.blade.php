@extends('layouts.frontend')
@section('content')
<!--modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-trash"></i> Confirm to delete this item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">            
            <p id="message-text" class="h4"></p>
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
@if($itemsInCart->count()>0)
<!--table-->
<div class="table-responsive">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Quantity</th>
        <th scope="col" class="d-none d-md-table-cell">Price</th>
        <th scope="col">Total</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    <?php $subtotal = 0; ?>
    @foreach ($itemsInCart as $item)
    <?php 
    $finalPrice = getFinalPrice($item);
    $totalByItem = getTotalByItem($item, $finalPrice);
    $subtotal = getSubtotal($subtotal,$totalByItem);
    ?>
    <tr>
    <th scope="row">{{$n++}}</th>
    <td class="d-flex justify-content-center"><img src="{{url('images') . '/' . $item->product->image}}" style="height:10vh;" alt="..." ></td>
    <td>{{$item->product->name}}</td>
    <td>{{$item->quantity}} pcs</td>
    <td class="d-none d-md-table-cell">
        @if ($item->product->discount > 0)
        <span class="mb-0" style="text-decoration: line-through;">${{number_format($item->product->price)}}</span>
        <span class="text-danger"><b>-{{$item->product->discount}}%</b></span>
        <p class="text-danger"><b>${{number_format($finalPrice)}}</b></p>
        @else
        <p>${{number_format($finalPrice)}}</p>
        @endif
    </td>
    <td>${{number_format($totalByItem)}}</td>
    <td>
        <a class="btn btn-info btn-sm mb-2" target="_blank" href="{{ route('frontend.products.show',$item->product->id) }}">Show</a>    
        <button type="button" class="btn btn-danger btn-sm mb-2" data-toggle="modal" data-target="#deleteModal" 
        data-url="{{ route('frontend.cart.destroy',$item->id) }}" data-item="{{ $item->product->name }}">Delete</button>
    </td>
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
<p class="h5"><b>Subtotal: ${{number_format($subtotal)}}</b></p>
<a class="btn btn-warning btn-lg" href="{{route('frontend.checkout.create_order')}}"><b>Proceed to buy</b></a>
@else
<div class="py-3">
  <p class="h1 py-3 text-center"><i class="fas fa-shopping-cart"></i> </p>
  <h4 class="text-center py-3">Your shopping cart is empty</h4>
  <div class="d-flex justify-content-center">
    <a href="{{route('frontend.site.index')}}" class="my-3 btn btn-primary btn-lg">Buy Now</a>
  </div>
  
</div>
@endif
@endsection    
        

