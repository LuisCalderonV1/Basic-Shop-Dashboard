@extends('layouts.frontend')
@section('content')
<div class="row product-info mt-5">
    <div class="col-12 col-md-7 px-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active bg-primary"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"class="bg-primary"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"class="bg-primary"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{url('images') . '/' . $product->image}}" class="d-block carousel-img" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{url('images') . '/1640469932.jpg'}}" class="d-block carousel-img" alt="...">
                </div>
                <div class="carousel-item">
                <img src="{{url('images') . '/' . $product->image}}" class="d-block carousel-img" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                <span class="carousel-control-prev-icon bg-primary p-3 rounded" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                <span class="carousel-control-next-icon bg-primary p-3 rounded" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    </div>
    <div class="col-12 col-md-5 px-0">
        <div class="px-2 px-md-4 my-5 my-md-0">
            @if ($product->discount > 0)
            <p class="mb-2 h4"><span class="text-danger p-2"><i class="fas fa-fire-alt"></i> Hot Sale</span></p>
            @endif   
            <h2 class="mb-0">{{$product->name}}</h2>
            <p>Ref. {{$product->reference}}</p>    
            @if ($product->discount > 0)
            <span class="card-text mb-0 h5" style="text-decoration: line-through;">${{number_format($product->price)}}</span>
            <span class="text-danger h5"><b>-{{$product->discount}}%</b></span>
            <p class="card-text text-danger h3"><b>${{number_format($product->price - ($product->discount * $product->price / 100) )}}</b></p>
            @else
            <p class="card-text h3">${{number_format($product->price)}}</p>
            @endif
            <div class="py-3">
                <form method="post"  action="{{ route('frontend.cart.store', $product->id) }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-danger"><b>Add to cart</b></button>
                    <button type="submit" class="btn btn-danger">Buy now</button>
                </form>
            </div>
            <a href=""><i class="fas fa-lock"></i> Security payment</a>
            <p class="card-title h5 py-4">{{$product->description}}</p>     
        </div>
    </div>
</div>
<!--Carousel-->
<div class="my-2 my-md-5">
    <h3>Related Products</h3>
    @include('frontend._products-carousel')
</div>

@endsection