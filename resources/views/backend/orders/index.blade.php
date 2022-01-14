<?php use Illuminate\Support\Facades\Auth;?>
@extends('layouts.backend')
@section('content')
<!--delete-modal-->
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
        <form action="{{ route('orders.destroy',1) }}" method="POST" id="form">   
              @csrf
              @method('DELETE')      
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!--/delete-modal-->
<h2>Orders</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">User</th>
        <th scope="col">Subtotal</th>
        <th scope="col">Shipping</th>
        <th scope="col">Total</th>
        <th scope="col">Payment</th>
        <th scope="col">Status</th>
        <th scope="col">Created at</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($orders as $order)
    <tr>
    <th scope="row">{{$order->id}}</th>
    <td>{{$order->user->name . " " . $order->user->lastname}}</td>
    <td>{{$order->subtotal}}</td>
    <td>{{$order->shipping}}</td>
    <td>${{number_format($order->total)}}</td>
    <td>{{$order->payment_status}}</td>
    <td>{{$order->general_status}}</td>
    <td>{{$order->created_at}}</td>
    <td>
        <a class="btn btn-info btn-sm" href="{{ route('orders.show',$order->id) }}">Show</a>    
        <a class="btn btn-primary btn-sm" href="{{ route('orders.edit',$order->id) }}">Edit</a>  
        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" 
        data-url="{{ route('orders.destroy',$order->id) }}" 
        data-item="{{ 'Order: ' . $order->id . ' User: ' . $order->user->name . ' ' . $order->user->lastname}}">Delete</button>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
{{ $orders->links() }}
@endsection    
        

