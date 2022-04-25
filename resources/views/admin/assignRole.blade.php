@extends('layout.app')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Update User Role</h4>
        {{-- <p class="card-description"> </p> --}}
        <form action="{{route('save-role')}}" method="POST" class="forms-sample">
            @csrf
          <div class="form-group">
            <label for="exampleInputName1">User Name</label>
            <select class="form-control" name="userid">
                <option>Select User</option>
                @foreach ($users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('name'))
                <span class="text text-danger">{{$errors->first('name')}}</span>
            @endif
          </div>
          <div class="form-group">
            <label for="exampleSelectGender">Select Role</label>
            <select class="form-control" name="roleid"  id="exampleSelectGender">
                <option>Select Role</option>
                @foreach ($roles as $role)
                <option value="{{ $role->id }}">{{$role->name}}</option>
                @endforeach
            </select>
            @if ($errors->has('name'))
            <span class="text text-danger">{{$errors->first('name')}}</span>
        @endif
          </div>
          <a><button type="submit" class="btn btn-gradient-primary me-2">Aassign Role</button></a>
          <button class="btn btn-light">Cancel</button>
        </form>
      </div>
    </div>
  </div>
@endsection
