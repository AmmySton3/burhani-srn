@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Deduct Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Sales</a></li>
              <li class="breadcrumb-item active">Deduct</li>
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
              <form role="form" action="{{ route('sales.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                            <div class="form-group">
                                <label for="serial_no">Item Name</label>
                                <select name="serial_no" id="serial_no" class="form-control" required>
                                    <option value="" disabled selected>Select an item</option>
                                    @foreach ($purchases as $purchase)
                                        <option value="{{ $purchase->serial_no }}">{{ $purchase->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="customer_name">Customer Name</label>
                                    <select name="name" id="name" class="form-control" required>
                                    <option value="" disabled selected>Select customer name</option>
                                    @foreach ($purchases as $purchase)
                                        <option value="{{ $purchase->serial_no }}">{{ $purchase->name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="invoice_no">Invoice No</label>
                                    <input type="text" class="form-control" id="c_invoice_no" name="c_invoice_no" placeholder="Invoice no">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="date_of_sales">Date</label>
                                    <input type="date" class="form-control datepicker" id="date_of_sales" name="date_of_sales" placeholder="vendor">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" placeholder="remarks"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="S">
                        </div>
                    </div>
                        <a href="{{ route('sales.index') }}"  class="btn btn-danger float-sm-center">Cancel</a>
                        <button type="submit" class="btn btn-primary float-sm-centre">Deduct</button>
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