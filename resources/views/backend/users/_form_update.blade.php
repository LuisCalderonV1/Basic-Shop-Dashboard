<form method="post"  action="{{ route('users.update', $user->id) }}">
@csrf
@method('PUT')
<div class="form-group">
      <label for="rol_id">Access</label>
      <select id="rol_id" class="form-control" name="rol_id" value="{{old('rol_id')}}">
        <option value="1" {{$user->rol_id == 1? 'selected': ''}}>Manager</option>
        <option value="2" {{$user->rol_id == 2? 'selected': ''}}>Regular</option>
      </select>
  </div>
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
  </div>
  <div class="form-group">
    <label for="name">Lastname</label>
    <input type="text" class="form-control" id="lastname" name="lastname" value="{{$user->lastname}}">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="{{$user->email}}">
  </div>
  <div class="form-group">
    <label for="password">Change Password</label>
    <input type="text" class="form-control" id="password" name="password">
  </div>
  </div>
  <a href="{{url()->previous()}}" class="btn btn-secondary">Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>