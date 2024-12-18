<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Purchase;
use App\Models\Asset;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sales::with('purchase')->get();
        return view('pages/sales', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deductedSerials = Sales::pluck('serial_no'); // Get all serial_no in sales table
        $purchases = Purchase::whereNotIn('serial_no', $deductedSerials)->get();
    
        return view('pages/sales-add', compact('purchases'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'serial_no' => 'required|exists:purchases,serial_no|unique:sales,serial_no',
            'customer_name' => 'required|string|max:100',
            'customer_address' => 'required|string|max:100',
            'customer_email' => 'required|string|max:100',
            'customer_tel' => 'required|string|max:100',
            'c_invoice_no' => 'nullable|string|max:100',
            'date_of_sales' => 'required|date',
            'status' => 'required|string|max:1',
            'remarks' => 'nullable|string|max:200',
        ]);
    
        // Set the status to 'S' for sales
        $validatedData['status'] = 'S';
    
        // Create a new sales record
        $sales = Sales::create($validatedData);
    
        // Check if the sales record was created
        if (!$sales) {
            return redirect()->route('sales.index')->with('error', 'Sales not saved.');
        }
    
        // Locate the asset by serial_no
        $asset = Asset::where('serial_no', $sales->serial_no)->first();
    
        if ($asset) {
            // Update the asset's fields
            $asset->update([
                'status' => $sales->status,
                'sales_id' => $sales->sales_id,
            ]);
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
                'customer_address' => 'required|string|max:100',
                'customer_email' => 'required|string|max:100',
                'customer_tel' => 'required|string|max:100',
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
