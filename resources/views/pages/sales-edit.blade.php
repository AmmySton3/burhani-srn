@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Deduction Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">sales</a></li>
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
                        <h3 class="card-title">Edit Deduction Details</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('sales.update', $sales->sales_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="serial_no">Serial No</label>
                                        <input type="text" class="form-control" id="serial_no" name="serial_no" value="{{ $sales->serial_no }}" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $sales->customer_name }}" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="c_invoice_no">Invoice No</label>
                                        <input type="text" class="form-control" id="c_invoice_no" name="c_invoice_no" value="{{ $sales->c_invoice_no }}" placeholder="Invoice no">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="date_of_sales">Date Of sales</label>
                                        <input type="date" class="form-control datepicker" id="date_of_sales" name="date_of_sales" value="{{ $sales->date_of_sales }}" placeholder="Date of sales">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="remarks">Remarks</label>
                                        <textarea class="form-control" id="remarks" name="remarks" placeholder="Remarks">{{ $sales->remarks }}</textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{ $sales->status }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ route('sales.index') }}" class="btn btn-danger float-left">Cancel</a>
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
