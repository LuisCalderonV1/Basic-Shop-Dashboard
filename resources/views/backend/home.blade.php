@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5 text-success"><i class="fas fa-star"></i> Products</div>
                <div class="card-body">
                    <h2><b>{{$products}}</b></h2>
                    <h3 class="mb-4">Products</h3>
                    <a href="{{route('products.index')}}" class="btn btn-success btn-block text-white">Go to products <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5 text-primary"><i class="fas fa-users"></i></i> Users</div>
                <div class="card-body">
                    <h2><b>{{$users}}</b></h2>
                    <h3 class="mb-4">Users</h3>
                    <a href="{{route('users.index')}}" class="btn btn-primary btn-block text-white">Go to users <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5 text-danger"><i class="fas fa-shopping-cart"></i> Orders</div>
                <div class="card-body">
                    <h2><b>{{$orders}}</b></h2>
                    <p class="mb-4 h3">Orders <span class="small text-muted">this month</span> </p>
                    <a href="{{route('orders.index')}}" class="btn btn-danger btn-block text-white">Go to orders <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5 text-info"><i class="fas fa-stream"></i> Categories</div>
                <div class="card-body">
                    <h2><b>{{$categories}}</b></h2>
                    <h3 class="mb-4">Categories</h3>
                    <a href="{{route('categories.index')}}" class="btn btn-info btn-block text-white">Go to categories <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header h5 text-secondary"><i class="fas fa-cog"></i> Settings</div>
                <div class="card-body">
                    <h2><i class="fas fa-cog"></i></h2>
                    <h3 class="mb-4">Settings</h3>
                    <a href="{{route('settings.edit')}}" class="btn btn-secondary btn-block text-white">Go to settings <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
