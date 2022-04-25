@extends('layout.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Role Update</h4>
        {{-- <p class="card-description"> Basic form elements </p> --}}
        <form action="{{route('update.role',$role->id)}}" method="post" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Name</label>
            <input type="text" class="form-control" name="name" value="{{$role->name}}" placeholder="Role Name">
            @if ($errors->has('name'))
                <span class="text text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Update Role</button>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
