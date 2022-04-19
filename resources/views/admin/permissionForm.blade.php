@extends('layout.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Permissions</h4>
        <p class="card-description"> Basic Permission Form </p>
        <form action="{{route('store-permission')}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Permission Name">
            @if ($errors->has('name'))
                <span class="text text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Add Permission</button>
        </form>
        {{-- <a href="{{route('permission_list')}}"><button class="btn btn-gradient-light me-2" >Revert Back</button></a> --}}

      </div>
    </div>
  </div>

@endsection
