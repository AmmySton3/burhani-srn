@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Vendor Information</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Vendor</a></li>
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
                        <h3 class="card-title">Edit Vendor Details</h3>
                    </div>
                    <div class="card-body">
                        <form role="form" action="{{ route('vendor.update', $vendor->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="vendor_name">Vendor Name</label>
                                        <input type="text" class="form-control" id="vendor_name" name="vendor_name" value="{{ $vendor->vendor_name }}" placeholder="Product name">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="cstomer_address">Vendor Address</label>
                                        <input type="text" class="form-control" id="cstomer_address" name="cstomer_address" value="{{ $vendor->cstomer_address }}" placeholder="Model no">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="vendor_email">Email</label>
                                        <input type="text" class="form-control" id="vendor_email" name="vendor_email" value="{{ $vendor->vendor_email }}" placeholder="Brand">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="vendor_tel">Vendor Tel</label>
                                        <input type="text" class="form-control" id="vendor_tel" name="vendor_tel" value="{{ $vendor->vendor_tel }}" placeholder="Invoice no">
                                    </div>
                                </div>
                                <input type="hidden" name="status" value="{{ $vendor->status }}">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a href="{{ route('vendor.index') }}" class="btn btn-danger float-left">Cancel</a>
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
