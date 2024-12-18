@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Vendor</a></li>
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
              <form role="form" action="{{ route('vendor.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vendor_name">Vendor Name</label>
                                    <input type="text" class="form-control" id="vendor_name" name="vendor_name" placeholder="Enter vendor Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vendor_address">Vendor Address</label>
                                    <input type="text" class="form-control" id="vendor_address" name="vendor_address" placeholder="vendor address">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vendor_email">Email</label>
                                    <input type="text" class="form-control" id="vendor_email" name="vendor_email" placeholder="vendor email">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vendor_tel">Vendor Tel</label>
                                    <input type="text" class="form-control" id="vendor_tel" name="vendor_tel" placeholder="Phone number">
                                </div>
                            </div>
                            </div>
                            <input type="hidden" name="status" value="A">
                        </div>
                    </div>
                        <a href="{{ route('vendors.index') }}"  class="btn btn-danger float-sm-center">Cancel</a>
                        <button type="submit" class="btn btn-primary float-sm-centre">Add vendor</button>
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