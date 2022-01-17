<form method="post"  action="{{ route('users.store') }}"  enctype="multipart/form-data">
    @csrf
  <div class="form-group">
      <label for="rol_id">Access</label>
      <select id="rol_id" class="form-control" name="rol_id">
        @foreach($rols as $rol)
        <option value="{{$rol->id}}" {{old('rol_id') == $rol->id? 'selected': ''}}>{{$rol->name}}</option>
        @endforeach
      </select>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
  </div>
  <div class="form-group">
    <label for="name">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="{{old('lastname')}}">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" id="password" name="password">
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>