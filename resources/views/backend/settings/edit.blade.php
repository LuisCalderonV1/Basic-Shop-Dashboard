@extends('layouts.backend')
@section('content')
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
      <strong>{{ session('status') }}</strong>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
@endif
<form method="POST" action="{{route('settings.update')}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @foreach ($settings as $setting)
    @if($setting->key== 'banner_image')
    <div class="form-group">
      <label for="{{$setting->name}}">{{$setting->name}}</label>
      <div class="col-12 p-0">
          <?php $banner = getSettings('banner_image')['value'] ?>
          <img src="{{ url('images/' . $banner)}}" alt="" id="img-1" class="img-fluid" style="max-height:300px;">
      </div>
        <input type="file" class="file-input my-2" id="{{$setting->name}}" name="{{$setting->key}}" onchange="previewFile(this, 1);">
        @error($setting->key)
          <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @else
    <div class="form-group">
        <label for="{{$setting->name}}">{{$setting->name}}</label>
        <input type="text" class="form-control" id="{{$setting->name}}" name="{{$setting->key}}" value="{{$setting->value}}">
        @error($setting->key)
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    @endif
  @endforeach
  <a href="{{ route('home') }}" class="btn btn-secondary">Go Back</a>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection