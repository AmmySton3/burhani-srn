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
            <h1 class="m-0 text-dark">Sales</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sales</li>
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
                <a href="{{ route('sales.create')}}" class="btn btn-info">Deduct New Item</a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Items Name</th>
                  <th>Serial No</th>
                  <th>Customer Name</th>
                  <th>Customer Address</th>
                  <th>Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($sales as $sale)
                <tr>
                  <td>{{ $sale->purchase->name ?? 'N/A'}}</td>
                  <td>{{ $sale->serial_no }}</td>
                  <td>{{ $sale->customer_name }}</td>
                  <td>{{ $sale->customer_address }}</td>
                  <td>{{ $sale->date_of_sales }}</td>
                  <td><a href="{{ route('sales.edit', $sale->sales_id)}}" class="btn btn-info">Edit</a> <a href="{{ route('sales.destroy', $sale->sales_id)}}" class="btn btn-danger">Delete</a></td>
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