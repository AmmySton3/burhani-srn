<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Purchase;
use App\Models\Asset;

class ReportController extends Controller
{
    public function index(Request $request){

        $serial_no = $request->input('serial_no');
        $data = null;

        if ($serial_no) {
            // Fetch data from the related models
            $data = [
                'sales' => Sales::where('serial_no', $serial_no)->with('purchase')->first(),
                'purchase' => Purchase::where('serial_no', $serial_no)->first(),
            ];
        }

        return view('pages/general', compact('data', 'serial_no'));
    }
}
