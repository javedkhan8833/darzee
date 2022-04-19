@extends('layout.app')
@section('content')
<div class="col-lg-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Roles List</h4>
        </p>
        <a href="{{route('role-form')}}" class="btn btn-primary btn-fw mb-3">Add Role</a>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Role ID</th>
              <th> Role Name </th>
              <th> Guard Name </th>
              <th> Created at </th>
              <th> Updatet at </th>
              <th> Actions </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($roles as $role)
            <tr class="table-warning">
                <td>{{$role->id}}</td>
                <td>{{$role->name}}</td>
                <td>{{$role->guard_name}}</td>
                <td>{{$role->created_at}}</td>
                <td>{{$role->updated_at}}</td>
                <td>
                    <a href="" class="btn btn-outline-primary btn-sm">Edit</a>
                    <a href="" class="btn btn-outline-danger btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
