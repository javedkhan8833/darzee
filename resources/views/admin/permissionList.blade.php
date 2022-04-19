@extends('layout.app')
@section('content')
<div class="row">

    <div class="col-lg-12 stretch-card">

    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Permission List</h4>
        <p>
            <a href="{{route('add-permission')}}" class="btn btn-primary btn-fw mb-3"> Add Permission</a>
        </p>
        <table class="table table-bordered">
            <thead>
                <tr>
              <th>Permission ID</th>
              <th> Permission Name </th>
              <th> Guard Name </th>
              <th> Created at </th>
              <th> Updated at </th>
              <th colspan="2"> Action </th>
            </tr>
        </thead>
          <tbody>
            @foreach ($permissions as $permission)

              <tr class="table-info">
                  <td> {{$permission->id}} </td>
                  <td> {{$permission->name}}</td>
                  <td> {{$permission->guard_name}} </td>
                  <td> {{$permission->created_at}}</td>
                  <td> {{$permission->updated_at}}</td>
                  <td>
                  <button class="btn btn-outline-primary btn-sm">Edit</button>
                  <button class="btn btn-outline-danger btn-sm">Delete</button>
                </td>
                </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>

</div>

</div>
@endsection
