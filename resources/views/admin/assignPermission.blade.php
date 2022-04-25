@extends('layout.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Assign Permission User Permissions</h4>
        {{-- <p class="card-description"> </p> --}}
        <form action="{{route('save-permission')}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">Role Name</label>
            <select class="form-control" name="roleid">
                <option>Select Role</option>
                @foreach ($roles as $role )
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('name'))
                <span class="text text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Select Permission</label>
            <select class="form-control" name="permissionid"  id="exampleSelectGender">
                <option>Select Permission</option>
                @foreach ($permissions as $permission)
                <option value="{{ $permission->id }}">{{$permission->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('name'))
            <span class="text text-danger">{{$errors->first('name')}}</span>
        @endif
          </div>
          <a><button type="submit" class="btn btn-gradient-primary me-2">Aassign Permission</button></a>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
