@extends('layouts.backend')
@section('content')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm to delete this item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <p id="message-text"></p>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="{{ route('products.destroy',1) }}" method="POST" id="form">   
              @csrf
              @method('DELETE')      
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
      </div>
    </div>
  </div>
</div>
<h2>Categories</h2>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<a href="{{route('categories.create')}}" class="btn btn-primary my-3">Create</a>
<div class="table-responsive">
    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col"></th>
        <th scope="col">Name</th>
        <th scope="col">Description</th>
        <th scope="col">Products</th>
        <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php $n=1; ?>
    @foreach ($categories as $category)
    <tr>
    <th scope="row">{{$n++}}</th>
    <td><img src="{{url('images') . '/' . $category->image}}" alt="" width="100" class="img-thumbnail"></td>
    <td>{{$category->name}}</td>
    <td>{{$category->description}}</td>
    <td>{{$category->products->count()}}</td>
    <td>
      <a class="btn btn-info btn-sm" href="{{ route('categories.show',$category->id) }}">Show</a>    
      <a class="btn btn-primary btn-sm" href="{{ route('categories.edit',$category->id) }}">Edit</a>  
      @if ($category->products->count()==0)
      <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal" 
      data-url="{{ route('categories.destroy',$category->id) }}" data-item="{{ $category->name }}">Delete</button>
      @else   
      <button class="btn btn-success btn-sm" disabled>Locked</button>       
      @endif

    </td>
    </tr>
    @endforeach
    </tbody>
    </table>
</div>
{{ $categories->links() }}
@endsection