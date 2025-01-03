@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @if (session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if (session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Purchases</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Purchase</li>
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
              <a href="{{ route('purchase.create')}}" class="btn btn-info">Add New Item</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Items Name</th>
                  <th>Serial No</th>
                  <th>Model No</th>
                  <th>Purchase date</th>
                  <th>Vendor</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($purchases as $purchase)
                <tr>
                  <td>{{$purchase->name}}</td>
                  <td>{{$purchase->serial_no}}</td>
                  <td>{{$purchase->model_no}}</td>
                  <td>{{$purchase->date_of_purchase}}</td>
                  <td>{{$purchase->vendor->vendor_name ?? 'N/A'}}</td>
                  <td><a href="{{ route('purchase.edit', $purchase->serial_no)}}" class="btn btn-info">Edit</a> <a href="{{ route('purchase.destroy', $purchase->serial_no)}}" class="btn btn-danger">Delete</a></td>
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