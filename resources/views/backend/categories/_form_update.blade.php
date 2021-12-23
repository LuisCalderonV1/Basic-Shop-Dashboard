<form method="post"  action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name"  value="{{$category->name}}">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" name="description"  value="{{$category->description}}">
  </div>
  <div class="form-group">
      <h3>Image</h3>
      <div class="col-12 col-md-4 p-0">
      <img src="{{url('images') . '/' . $category->image}}" alt="" width="100" class="img-thumbnail" id="img-1">
          <input type="file" class="file-input my-2" name="image" onchange="previewFile(this, 1);">
      </div>
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-success">Submit</button>
</form>