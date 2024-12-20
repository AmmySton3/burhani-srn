@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Search</a></li>
                        <li class="breadcrumb-item active">Report</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Search Serial Number</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('report.index') }}" method="GET">
                                <div class="form-group row">
                                    <label for="serial_no" class="col-sm-2 col-form-label">S/No:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="serial_no" name="serial_no" placeholder="Enter Serial Number" value="{{ $serial_no ?? '' }}">
                                    </div>
                                    <button type="submit" class="btn btn-info">Search</button>
                                </div>
                            </form>

                            @if($data)
                                <h6>Search Results for Serial No: {{ $serial_no }}</h6>
                                <div class="invoice p-3 mb-3">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Burhani Infosys Ltd
                                        <small class="float-right"></small>
                                    </h4>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                 @if($data['purchase'])
                                    From
                                    <address>
                                   <strong> Company Name: {{ $data['purchase']->vendor->vendor_name}} </strong><br>
                                   <strong> Product Name: {{ $data['purchase']->name }}</strong> <br>
                                   <strong> Date: {{ $data['purchase']->date_of_purchase }}</strong> <br>
                                   <strong> Phone: {{ $data['purchase']->vendor->vendor_tel }}</strong><br>
                                   <strong> Email: {{ $data['purchase']->vendor->vendor_email }}</strong> <br>
                                   <strong> Invoice No: {{ $data['purchase']->invoice_no }}</strong>
                                    </address>
                                    @endif
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                    @if($data['sales'])
                                    To
                                    <address>
                                        <strong>Customer Name: {{ $data['sales']->customer->customer_name }} </strong><br>
                                        <strong>Date: {{ $data['sales']->date_of_sales }}</strong> <br>
                                        <strong>Phone: {{ $data['sales']->customer->customer_tel }}</strong> <br>
                                        <strong>Email: {{ $data['sales']->customer->customer_email }}</strong> <br>
                                        <strong>Invoice No: {{ $data['sales']->c_invoice_no }}</strong>
                                    </address>
                                    @endif
                                    </div>
                                </div>

                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-12">
                                    <a href="" onclick="window.print()" class="btn btn-success float-right">
                                        <i class="fas fa-download"></i> Generate PDF </a>
                                    </div>
                                </div>
                                </div>
                            @else
                                <p>No results found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
