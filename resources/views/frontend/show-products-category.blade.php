@extends('layouts.frontend')
@section('content')
<!--All-by-category-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>All Products in {{$products[0]->category->name}}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-6 col-md-4 mb-3">
        @include('frontend._product-card')   
        </div>
        @endforeach
    </div>
</div>
@endsection