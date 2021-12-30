@extends('layouts.frontend')
@section('content')
<div class="banner d-flex justify-content-center">
    <img src="{{url('images/banner.jpg')}}" alt="" class="img-fluid">
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
        <div class="col-10 col-md-4 mb-3">
            <div class="card" >
                <a href="">
                    <img src="{{url('images') . '/' . $category->image}}" class="card-img-top p-1" alt="..." >
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <p class="card-text">{{$category->description}}</p>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
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
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
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
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
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
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
@endsection