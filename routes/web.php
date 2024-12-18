<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;

Route::get('/', function () {
    return view('home');
});

Route::get('/report', [ReportController::class, 'index'])->name('report.index');

Route::resource('purchase', PurchaseController::class);

Route::resource('sales', SalesController::class);

Route::resource('user', UserController::class);

Route::resource('customer', CustomerController::class);

Route::resource('vendor', VendorController::class);
