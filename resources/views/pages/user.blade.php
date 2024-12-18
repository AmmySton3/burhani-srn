@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
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
                <form method="POST" action="">
                  <h3><button type="submit" class="btn btn-info">Add New User</button></h3>
                </form>
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
                <tr>
                  <td>1</td>
                  <td>Amanzi Athumani</td>
                  <td>Admin</td>
                  <td>admin@gmail.com</td>
                  <td>Active</td>
                  <td> <a href="#">
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