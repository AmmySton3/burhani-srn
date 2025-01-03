<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Purchase;
use App\Models\Asset;
use App\Models\customer;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::with('purchase', 'customer')->get();
        return view('pages/sales', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deductedSerials = Sales::pluck('serial_no'); // Get all serial_no in sales table
        $purchases = Purchase::whereNotIn('serial_no', $deductedSerials)->get();
        $customers = customer::all();
        return view('pages/sales-add', compact('purchases', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'serial_no' => 'required|array', // Ensure it is an array
            'serial_no.*' => 'exists:purchases,serial_no|unique:sales,serial_no', // Validate each serial_no
            'customer_name' => 'required|string|max:100',
            'c_invoice_no' => 'nullable|string|max:100',
            'date_of_sales' => 'required|date',
            'remarks' => 'nullable|string|max:200',
        ]);
    
        $status = 'S'; // Sales status
    
        // Loop through each serial_no and create a sales record
        foreach ($validatedData['serial_no'] as $serialNo) {
            $sales = Sales::create([
                'serial_no' => $serialNo,
                'customer_name' => $validatedData['customer_name'],
                'c_invoice_no' => $validatedData['c_invoice_no'],
                'date_of_sales' => $validatedData['date_of_sales'],
                'status' => $status,
                'remarks' => $validatedData['remarks'],
            ]);
    
            // Update the related asset's fields
            $asset = Asset::where('serial_no', $serialNo)->first();
            if ($asset) {
                $asset->update([
                    'status' => $status,
                    'sales_id' => $sales->sales_id,
                ]);
            }
        }
    
        // Redirect back with a success message
        return redirect()->route('sales.index')->with('success', 'Sales successfully saved.');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $sales = Sales::find($id);
         return view('pages/sales-edit',compact('sales'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $sales = Sales::find($id);

        if(!$sales) {
            return redirect()->route('sales.index')->with('error', 'Sales not found.');
        }else{
            $validatedData = $request->validate([
                'serial_no' => 'required|integer',
                'customer_name' => 'required|string|max:100',
                'c_invoice_no' => 'nullable|string|max:100',
                'date_of_sales' => 'required|date',
                'status' => 'required|string|max:1',
                'remarks' => 'nullable|string|max:200',
            ]);

            $sales->update($validatedData);

            return redirect()->route('sales.index')->with('success', 'Sales successfully updated.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sales = Sales::find($id);

        if(!$sales) {
            return redirect()->route('sales.index')->with('error', 'Sales not found.');       
        }
        else {
            $sales->delete();
            return redirect()->route('sales.index')->with('success', 'Sales successfully deleted.');
        }
    }
}
