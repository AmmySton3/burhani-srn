@extends('layouts.app')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Add New Item</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Purchase</a></li>
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
              <form role="form" action="{{ route('purchase.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="serial_no">Serial No</label>
                                    <input type="text" class="form-control" id="serial_no" name="serial_no" placeholder="Enter Serial No">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="name">Item Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="product name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="model_no">Model No</label>
                                    <input type="text" class="form-control" id="model_no" name="model_no" placeholder="model no">
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="company">Brand</label>
                                    <input type="text" class="form-control" id="company" name="company" placeholder="Description">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="invoice_no">Invoice No</label>
                                    <input type="text" class="form-control" id="invoice_no" name="invoice_no" placeholder="Invoice no">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="date_of_purchase">Date Of Purchase</label>
                                    <input type="date" class="form-control datepicker" id="date_of_purchase" name="date_of_purchase" placeholder="vendor">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="vendor">Vendor</label>
                                    <select name="vendor" id="vendor" class="form-control" required>
                                    <option value="" disabled selected>Select vendor</option>
                                     @foreach ($vendors as $vendor)
                                        <option value="{{ $vendor->id }}">{{ $vendor->vendor_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="remarks">Remarks</label>
                                    <textarea class="form-control" id="remarks" name="remarks" placeholder="remarks"></textarea>
                                </div>
                            </div>
                            <input type="hidden" name="status" value="P">
                        </div>
                    </div>
                        <a href="{{ route('purchase.index') }}"  class="btn btn-danger float-sm-center">Cancel</a>
                        <button type="submit" class="btn btn-primary float-sm-centre">Add Product</button>
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