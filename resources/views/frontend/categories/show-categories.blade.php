@extends('layouts.frontend')
@section('content')
<!--categories-->
<div>
    <div class="row">
        <div class="col">
            <h2 class="mb-4">All Categories</h2>
        </div>
    </div>
    <div class="row d-flex">
        @foreach ($categories as $category)
        @include('frontend.categories._category-card')  
        @endforeach
    </div>
</div>
{{$categories->links()}}
<!--Carousel-->
<h3>New Products</h3>
@include('frontend.products._products-carousel')
@endsection