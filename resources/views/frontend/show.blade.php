@extends('layouts.frontend')
@section('content')
<div class="row product-info mt-5">
    <div class="col-12 col-md-7 px-0">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="{{url('images') . '/' . $product->image}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{url('images') . '/' . $product->image}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="{{url('images') . '/' . $product->image}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
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
                <button class="btn btn-outline-danger"><b>Add to cart</b></button>
                <button class="btn btn-danger">Buy now</button>
            </div>
            <a href=""><i class="fas fa-lock"></i> Security payment</a>
            <p class="card-title h5 py-4">{{$product->description}}</p>     
        </div>
    </div>
</div>

<div class="container my-4">
    <!--Carousel Wrapper-->
    <div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">

  <!--Controls-->
    <div class="py-5">
        <a class="btn-primary px-4 py-3 mx-2 btn-floating rounded" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
        <a class="btn-primary px-4 py-3 mx-2 btn-floating rounded" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
    </div>

    <!--Indicators-->
    <ol class="carousel-indicators">
        <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
        <li data-target="#multi-item-example" data-slide-to="1"></li>
        <li data-target="#multi-item-example" data-slide-to="2"></li>
    </ol>

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        @if(isset($related[0]))
        <div class="carousel-item active">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[0] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._related-product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
        @if(isset($related[1]))
        <div class="carousel-item">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[1] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._related-product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
        @if(isset($related[2]))
        <div class="carousel-item">
            <div class="row">
                <?php $n=0; ?>                
                @foreach($related[2] as $product)
                    @if($n==0)
                    <div class="col-md-4"> 
                    @else
                    <div class="col-md-4 clearfix d-none d-md-block"> 
                    @endif                   
                    @include('frontend._related-product-card')
                    </div>
                <?php $n++; ?>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    </div>
</div>
@endsection