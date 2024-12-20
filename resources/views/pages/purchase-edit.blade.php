@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Item Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Purchase</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Purchase Details</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('purchase.update', $purchase->serial_no) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="serial_no">Serial No</label>
                                        <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ $purchase->serial_no }}" placeholder="Enter Serial No">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="name">Item Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $purchase->name }}" placeholder="Product name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="model_no">Model No</label>
                                        <input type="text" class="form-control" id="model_no" name="model_no" value="{{ $purchase->model_no }}" placeholder="Model no">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="company">Brand</label>
                                        <input type="text" class="form-control" id="company" name="company" value="{{ $purchase->company }}" placeholder="Brand">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="invoice_no">Invoice No</label>
                                        <input type="text" class="form-control" id="invoice_no" name="invoice_no" value="{{ $purchase->invoice_no }}" placeholder="Invoice no">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date_of_purchase">Date Of Purchase</label>
                                        <input type="date" class="form-control datepicker" id="date_of_purchase" name="date_of_purchase" value="{{ $purchase->date_of_purchase }}" placeholder="Date of purchase">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="vendor_name">Vendor</label>
                                        <input type="text" class="form-control" id="vendor_name" name="vendor_name" value="{{ $purchase->vendor_name }}" placeholder="Vendor">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks">{{ $purchase->remarks }}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{ $purchase->status }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ route('purchase.index') }}" class="btn btn-danger float-left">Cancel</a>
                                    <button type="submit" class="btn btn-primary float-right">Update</button>
                                </div>
                            </div>
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
