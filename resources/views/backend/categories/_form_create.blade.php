<form method="post"  action="{{ route('categories.store') }}"  enctype="multipart/form-data">
    @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}">
  </div>
  <div class="form-group">
      <h3>Image</h3>
      <div class="col-12 col-md-4 p-0">
          <img src="" alt="" id="img-1" width="200px">
          <input type="file" class="file-input my-2" name="image" onchange="previewFile(this, 1);">
      </div>
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-success">Submit</button>
</form>