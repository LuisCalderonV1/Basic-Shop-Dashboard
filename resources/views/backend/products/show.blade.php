@extends('layouts.backend')
@section('content')
<h2>View Product</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<form>
    @csrf
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" id="category" name="category_id" readonly>
        <option value="1">{{$product->category->name}}</option>
      </select>
    </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" readonly value="{{$product->name}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" readonly value="{{$product->description}}">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price" readonly value="{{$product->price}}">
  </div>
  <div class="form-group">
    <label for="discount">Discount</label>
    <input type="text" class="form-control" id="discount" name="discount" readonly value="{{$product->discount}}">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" class="form-control" id="stock" name="stock" readonly value="{{$product->stock->quantity}}">
  </div>
  <div class="form-group">
      <h3>Image</h3>
      <div class="col-12 col-md-4 p-0">
          <img src="{{url('images') . '/' . $product->image}}" alt="" id="img-1" width="200px">
      </div>
  </div>
  <a href="{{route('products.index')}}" class="btn btn-secondary">Back</a>
</form>
@endsection