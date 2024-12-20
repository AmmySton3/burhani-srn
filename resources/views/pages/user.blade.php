@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Display Flash Messages -->
     @if (session('success'))
      <div class="alert alert-success col-sm-9 collapse" role="alert">
          {{ session('success') }}
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger col-sm-9 collapse" role="alert">
          {{ session('error') }}
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
              <h3 class="card-title">
                <a href="{{ route('user.create')}}" class="btn btn-info">Add New User</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User ID</th>
                  <th>Name</th>
                  <th>Role</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                <tr>
                  <td>{{$user->user_id}}</td>
                  <td>{{$user->first_name}}  {{$user->last_name}}</td>
                  <td>{{$user->roles->description ?? 'N/A'}}</td>
                  <td>{{$user->email}}</td>
                  <td>Active</td>
                  <td> <a href="{{route('user.edit', $user->user_id)}}">
                            <input type="image" title="Edit User" src="{{ asset('img/user_edit.png') }}" width="16px" />
                        </a>
                        &nbsp;
                        <a href="#">
                            <input type="image" title="Change Password" src="{{ asset('img/reset.png') }}" width="16px" />
                        </a>
                        &nbsp;
                        <a href="#" onclick="toggleUserStatus(this)">
                            <input id="delete-icon" type="image" title="Delete User" src="{{ asset('img/error.png') }}" width="16px" />
                        </a>
                  </td>
                </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection