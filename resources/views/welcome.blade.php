@extends('layouts.frontend')
@section('content')
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Categories</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-12 col-md-4">
            <div class="card"  style="width: 18rem;">
                <a href="">
                    <img src="{{url('images') . '/' . $category->image}}" class="card-img-top" alt="..." >
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <p class="card-text">{{$category->description}}</p>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
</div>
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>New Products</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        <div class="col-12 col-md-4">
            <div class="card"  style="width: 18rem;">
                <a href="">
                    <img src="{{url('images') . '/' . $product->image}}" class="card-img-top" alt="..." >
                </a>
                <div class="card-body">
                    <h5 class="card-title mb-0">{{$product->name}}</h5>
                    <p class="small">{{$product->reference}}</p>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text">${{number_format($product->price)}}</p>
                </div>
            </div>
        </div>    
        @endforeach
    </div>
</div>
@endsection