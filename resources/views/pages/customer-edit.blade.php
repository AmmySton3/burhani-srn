@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Customer Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Customer</a></li>
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
                        <h3 class="card-title">Edit Customer Details</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('customer.update', $customer->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $customer->customer_name }}" placeholder="Product name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="customer_address">Customer Address</label>
                                        <input type="text" class="form-control" id="customer_address" name="customer_address" value="{{ $customer->customer_address }}" placeholder="Model no">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="customer_email">Email</label>
                                        <input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ $customer->customer_email }}" placeholder="Brand">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="customer_tel">Customer Tel</label>
                                        <input type="text" class="form-control" id="customer_tel" name="customer_tel" value="{{ $customer->customer_tel }}" placeholder="Invoice no">
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{ $customer->status }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ route('customer.index') }}" class="btn btn-danger float-left">Cancel</a>
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
