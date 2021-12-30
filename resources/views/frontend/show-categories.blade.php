@extends('layouts.frontend')
@section('content')
<!--categories-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>All Categories</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @foreach ($categories as $category)
        @include('frontend._category-card')  
        @endforeach
    </div>
</div>
<!--Carousel-->
@include('frontend._products-carousel')
@endsection