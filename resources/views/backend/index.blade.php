@extends('layouts.backend')
@section('content')
<h2>Products</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<a href="{{route('products.create')}}" class="btn btn-primary my-3">Create</a>
<div class="table-responsive">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Ref</th>
        <th scope="col">Category</th>
        <th scope="col">Name</th>
        <th scope="col">Price</th>
        <th scope="col">Discount</th>
        <th scope="col">Stock</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    @foreach ($products as $product)
    <tr>
    <th scope="row">{{$n++}}</th>
    <td>{{$product->reference}}</td>
    <td>{{$product->category->name}}</td>
    <td>{{$product->name}}</td>
    <td>${{number_format($product->price)}}</td>
    <td>{{$product->discount}}%</td>
    <td>0 pzas</td>
    <td>
    <form action="{{ route('products.destroy',$product->id) }}" method="POST">   
        <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>    
        <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>   
        @csrf
        @method('DELETE')      
        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
    </form>
    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
{{ $products->links() }}
@endsection