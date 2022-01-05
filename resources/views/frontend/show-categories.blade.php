@extends('layouts.frontend')
@section('content')
<!--categories-->
<div>
    <div class="row">
        <div class="col">
            <h2 class="mb-4">All Categories</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @foreach ($categories as $category)
        @include('frontend._category-card')  
        @endforeach
    </div>
</div>
<!--Carousel-->
<h3>New Products</h3>
@include('frontend._products-carousel')
@endsection