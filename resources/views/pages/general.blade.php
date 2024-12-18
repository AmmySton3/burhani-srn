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
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Model</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($data['sales'])
                                            <tr>
                                                <td>Sales</td>
                                                <td>
                                                    Customer: {{ $data['sales']->customer_name }}<br>
                                                    Date: {{ $data['sales']->date_of_sales }}
                                                </td>
                                            </tr>
                                        @endif
                                        @if($data['purchase'])
                                            <tr>
                                                <td>Purchase</td>
                                                <td>
                                                    Name: {{ $data['purchase']->name }}<br>
                                                    Date of Purchase: {{ $data['purchase']->date_of_purchase }}
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
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
