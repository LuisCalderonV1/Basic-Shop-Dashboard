@extends('layouts.backend')
@section('content')
<h2>View Category</h2>
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
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" readonly value="{{$category->name}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" readonly value="{{$category->description}}">
  </div>
  <div class="form-group">
      <h3>Image</h3>
      <img src="{{url('images') . '/' . $category->image}}" alt="" width="100" class="img-thumbnail">
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
</form>
@endsection