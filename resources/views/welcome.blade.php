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
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
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
                    <p class="small">Ref: {{$product->reference}}</p>
                    @if ($product->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($product->price)}}</span>
                    <span class="text-danger"><b>-{{$product->discount}}%</b></span>
                    <p class="card-text text-danger h5">${{number_format($product->price - ($product->discount * $product->price / 100) )}}</p>
                    @else
                    <p class="card-text h5">${{number_format($product->price)}}</p>
                    @endif
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Last Offers</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($offers as $offer)
        <div class="col-12 col-md-4">
            <div class="card"  style="width: 18rem;">
                <a href="">
                    <img src="{{url('images') . '/' . $offer->image}}" class="card-img-top" alt="..." >
                </a>
                <div class="card-body">
                    <p><span class="bg-danger text-white p-2 my-2 rounded">Hot Sale</span></p>
                    <h5 class="card-title mb-0">{{$offer->name}}</h5>
                    <p class="small">Ref: {{$offer->reference}}</p>
                    @if ($offer->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($offer->price)}}</span>
                    <span class="text-danger"><b>-{{$offer->discount}}%</b></span>
                    <p class="card-text text-danger h5">${{number_format($offer->price - ($offer->discount * $offer->price / 100) )}}</p>
                    @else
                    <p class="card-text h5">${{number_format($product->price)}}</p>
                    @endif                    
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Last in {{$random_category->name}}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($last_in_category as $product)
        <div class="col-12 col-md-4">
            <div class="card"  style="width: 18rem;">
                <a href="">
                    <img src="{{url('images') . '/' . $product->image}}" class="card-img-top" alt="..." >
                </a>
                <div class="card-body">
                    <h5 class="card-title mb-0">{{$product->name}}</h5>
                    <p class="small">Ref: {{$product->reference}}</p>
                    @if ($product->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($product->price)}}</span>
                    <span class="text-danger"><b>-{{$product->discount}}%</b></span>
                    <p class="card-text text-danger h5">${{number_format($product->price - ($product->discount * $product->price / 100) )}}</p>
                    @else
                    <p class="card-text h5">${{number_format($product->price)}}</p>
                    @endif                    
                </div>
            </div>
        </div>    
        @endforeach
    </div>
    <a href="" class="btn btn-primary mt-3">See more <i class="fas fa-arrow-right"></i></a>
</div>
@endsection