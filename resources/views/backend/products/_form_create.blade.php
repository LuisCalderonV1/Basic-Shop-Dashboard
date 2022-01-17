<form method="post"  action="{{ route('products.store') }}"  enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="category">Category</label>
      <select class="form-control" id="category" name="category_id">
        <option value=""></option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}" {{$selection = old('category_id') == $category->id ? 'selected' : '' }}>{{$category->name}}</option>       
        @endforeach
      </select>
    </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
  </div>
  <div class="form-group">
    <label for="price">Price</label>
    <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
  </div>
  <div class="form-group">
    <label for="discount">Discount</label>
    <input type="text" class="form-control" id="discount" name="discount" value="{{old('discount')}}">
  </div>
  <div class="form-group">
    <label for="stock">Stock</label>
    <input type="text" class="form-control" id="stcok" name="stock" value="{{old('stock')}}">
  </div>
  <div class="form-group">
      <h3>Image</h3>
      <div class="col-12 col-md-4 p-0">
          <img src="" alt="" id="img-1" width="200px">
          <input type="file" class="file-input my-2" name="image" onchange="previewFile(this, 1);">
      </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>