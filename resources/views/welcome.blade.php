@extends('layouts.frontend')
@section('content')
<h2>New Products</h2>
<div class="row py-3">
    @foreach ($products as $product)
    <div class="col-12 col-md-4">
        <div class="card"  style="width: 18rem;">
            <a href="">
                <img src="{{url('images') . '/' . $product->image}}" class="img-fluid" alt="..." >
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
@endsection