@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        @for ($n=0; $n <=5; $n++)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5"><i class="fas fa-shopping-cart"></i> Products</div>
                <div class="card-body">
                    <h2><b>19</b></h2>
                    <h3 class="mb-4">New Products</h3>
                    <a href="{{route('products.index')}}" class="btn btn-info btn-block text-white">Go to products <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</div>
@endsection
