@extends('layouts.backend')
@section('content')
<h2>Create Category</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@include('backend.categories._form_create')
@endsection