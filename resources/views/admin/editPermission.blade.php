@extends('layout.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update Permission</h4>
        {{-- <p class="card-description"> Basic Permission Form </p> --}}
        <form action="{{route('permission.update',$permission->id)}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" value="{{$permission->name}}" placeholder="Permission Name">
            @if ($errors->has('name'))
                <span class="text text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <button type="submit" class="btn btn-gradient-primary me-2">Update Permission</button>
        </form>

      </div>
    </div>
  </div>

@endsection
