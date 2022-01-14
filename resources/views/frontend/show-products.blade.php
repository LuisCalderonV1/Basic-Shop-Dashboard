@extends('layouts.frontend')
@section('content')
<!--All-by-category-->
<div>
    <!--products-->
    <div class="row">
        <div class="col">
            <h2 class="mb-4">{{$title}}</h2>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $product)
        @include('frontend._product-card')   
        @endforeach
    </div>
</div>
{{$products->links()}}
@endsection