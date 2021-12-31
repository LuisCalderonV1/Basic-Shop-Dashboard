@extends('layouts.frontend')
@section('content')
<div class="banner d-flex justify-content-center">
    <img src="{{url('images/banner.png')}}" alt="" class="img-fluid">
</div>
<!--New-products-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>New Products</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-6 col-md-4 mb-3">
        @include('frontend._product-card')   
        </div>
        @endforeach
    </div>
    <a href="{{route('frontend.products.show_new')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<!--categories-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Categories</h2>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        @foreach ($categories as $category)
        @include('frontend._category-card')  
        @endforeach
    </div>
    <a href="{{route('frontend.categories.index')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<!--offers-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Last Offers</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($offers as $product)
        <div class="col-6 col-md-4 mb-3">
        @include('frontend._product-card') 
        </div>  
        @endforeach
    </div>
    <a href="{{route('frontend.products.show_offers')}}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<!--last-in-category-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Last in {{$random_category->name}}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($last_in_category as $product)
        <div class="col-6 col-md-4 mb-3">
        @include('frontend._product-card')
        </div> 
        @endforeach
    </div>
    <a href="{{ route('frontend.categories.show',$random_category->id) }}" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
@endsection