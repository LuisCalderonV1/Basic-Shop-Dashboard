@extends('layouts.backend')
@section('content')
<h2>View User</h2>
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
    <label for="access">Access</label>
    <input type="text" class="form-control" id="access" name="access" value="{{$user->rol->name}}" readonly>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" readonly>
  </div>
  <div class="form-group">
    <label for="name">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}" readonly>
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}" readonly>
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
</form>
@endsection