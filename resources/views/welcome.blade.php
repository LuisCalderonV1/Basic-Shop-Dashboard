@extends('layouts.frontend')
@section('content')
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
            <div class="card">
                <a href="">
                    <img src="{{url('images') . '/' . $product->image}}" class="card-img-top p-1" alt="..." >
                </a>
                <div class="card-body">
                    @if ($product->discount > 0)
                    <p class="mb-1"><span class="bg-danger text-white small p-1 rounded"><i class="fas fa-fire-alt"></i> Hot Sale</span></p>
                    @endif
                    <h5 class="card-title mb-0">{{$product->name}}</h5>
                    <p class="small mb-0">Ref. {{$product->reference}}</p>
                    @if ($product->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($product->price)}}</span>
                    <span class="text-danger"><b>-{{$product->discount}}%</b></span>
                    <p class="card-text text-danger h5"><b>${{number_format($product->price - ($product->discount * $product->price / 100) )}}</b></p>
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
<!--offers-->
<div class="py-3">
    <div class="row">
        <div class="col">
            <h2>Last Offers</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($offers as $offer)
        <div class="col-6 col-md-4 mb-3">
            <div class="card">
                <a href="">
                    <img src="{{url('images') . '/' . $offer->image}}" class="card-img-top p-1" alt="..." >
                </a>
                <div class="card-body">
                    @if ($offer->discount > 0)
                    <p class="mb-1"><span class="bg-danger text-white small p-1 rounded"><i class="fas fa-fire-alt"></i> Hot Sale</span></p>
                    @endif
                    <h5 class="card-title mb-0">{{$offer->name}}</h5>
                    <p class="small mb-0">Ref. {{$offer->reference}}</p>
                    @if ($offer->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($offer->price)}}</span>
                    <span class="text-danger"><b>-{{$offer->discount}}%</b></span>
                    <p class="card-text text-danger h5"><b>${{number_format($offer->price - ($offer->discount * $offer->price / 100) )}}</b></p>
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
            <div class="card">
                <a href="">
                    <img src="{{url('images') . '/' . $product->image}}" class="card-img-top p-1" alt="..." >
                </a>
                <div class="card-body">
                    @if ($product->discount > 0)
                    <p class="mb-1"><span class="bg-danger text-white small p-1 rounded"><i class="fas fa-fire-alt"></i> Hot Sale</span></p>
                    @endif
                    <h5 class="card-title mb-0">{{$product->name}}</h5>
                    <p class="small mb-0">Ref. {{$product->reference}}</p>
                    @if ($product->discount > 0)
                    <span class="card-text mb-0" style="text-decoration: line-through;">${{number_format($product->price)}}</span>
                    <span class="text-danger"><b>-{{$product->discount}}%</b></span>
                    <p class="card-text text-danger h5"><b>${{number_format($product->price - ($product->discount * $product->price / 100) )}}</b></p>
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