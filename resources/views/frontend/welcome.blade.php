@extends('layouts.frontend')
@section('content')
<div class="banner d-flex justify-content-center">
    <img src="{{ url('images/' . getSettings('banner_image')['value'])}}" alt="" class="img-fluid">
</div>
<!--New-products-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">New Products</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        @include('frontend.products._product-card')   
        @endforeach
    </div>
    <a href="{{route('frontend.products.show_new')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<!--categories-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Categories</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($categories as $category)
        @include('frontend.categories._category-card')  
        @endforeach
    </div>
    <a href="{{route('frontend.categories.index')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<!--offers-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Last Offers</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($offers as $product)
        @include('frontend.products._product-card')  
        @endforeach
    </div>
    <a href="{{route('frontend.products.show_offers')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
@if(count($last_in_category) > 0)
<!--last-in-category-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2 class="mb-4">Last in {{$random_category->name}}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($last_in_category as $product)
        @include('frontend.products._product-card')
        @endforeach
    </div>
    <a href="{{ route('frontend.categories.show',$random_category->id) }}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
@endif
@endsection