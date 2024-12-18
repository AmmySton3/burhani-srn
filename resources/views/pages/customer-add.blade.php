@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Customer</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Customer</a></li>
              <li class="breadcrumb-item active">Add</li>
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
              <form role="form" action="{{ route('customer.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <input type="text" class="form-control" id="customer_name" name="customer_name" placeholder="Enter Customer Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="customer_address">Customer Address</label>
                                    <input type="text" class="form-control" id="customer_address" name="customer_address" placeholder="Customer address">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="customer_email">Email</label>
                                    <input type="text" class="form-control" id="customer_email" name="customer_email" placeholder="Customer email">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="customer_tel">Customer Tel</label>
                                    <input type="text" class="form-control" id="customer_tel" name="customer_tel" placeholder="Phone number">
                                </div>
                            </div>
                            </div>
                            <input type="hidden" name="status" value="A">
                        </div>
                        <a href="{{ route('customer.index') }}"  class="btn btn-danger float-sm-center">Cancel</a>
                        <button type="submit" class="btn btn-primary float-sm-centre">Add Customer</button>
                </form>
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