<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Sales;
use App\Models\Customer;
use App\Models\Vendor;  

class DashboardController extends Controller
{
    public function index()
    {
        $purchasesCount = purchase::count();
        $salesCount = sales::count();
        $customersCount = customer::count();
        $vendorsCount = vendor::count();

        return view('home', compact('purchasesCount', 'salesCount', 'customersCount', 'vendorsCount'));
    }
}
