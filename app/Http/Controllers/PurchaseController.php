<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchase;
use App\Models\asset;
use App\Models\vendor;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = purchase::with('vendor')->get();
        return view('pages/purchase', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vendors = vendor::all();
        return view('pages/purchase-add', compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $validatedData = $request->validate([
            'serial_no' => 'required|array', // Ensure it is an array
            'serial_no.*' => 'required|string|max:20', // Validate each serial number
            'model_no' => 'nullable|string|max:20',
            'name' => 'required|string|max:100',
            'company' => 'nullable|string|max:100',
            'invoice_no' => 'nullable|string|max:100',
            'date_of_purchase' => 'required|date',
            'vendor_name' => 'required|string|max:100',
            'status' => 'required|string|max:1',
            'remarks' => 'nullable|string|max:200',
        ]);

        foreach ($validatedData['serial_no'] as $serial_number) {
            $purchase = purchase::create([
                'serial_no' => $serial_number,
                'model_no' => $validatedData['model_no'],
                'name' => $validatedData['name'],
                'company' => $validatedData['company'],
                'invoice_no' => $validatedData['invoice_no'],
                'date_of_purchase' => $validatedData['date_of_purchase'],
                'vendor_name' => $validatedData['vendor_name'],
                'status' => $validatedData['status'],
                'remarks' => $validatedData['remarks'],
            ]);
        }

        if (!$purchase) {
            return redirect()->route('purchase.index')->with('error', 'Items not saved.');
        }
    
        return redirect()->route('purchase.index')->with('success', 'Items successfully saved.');
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
    public function edit( string $id )
    {
        $purchase = purchase::find($id);
        return view('pages/purchase-edit', ['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = purchase::find($id);

        if(!$purchase) {
            return redirect()->route('purchase.index')->with('error', 'Item not found.');       
        }
            $validatedData = $request->validate([
                'serial_no' => 'required|integer',
                'model_no' => 'required|string|max:20',
                'name' => 'required|string|max:100',
                'company' => 'required|string|max:100',
                'invoice_no' => 'nullable|string|max:100',
                'date_of_purchase' => 'required|date',
                'vendor_name' => 'required|string|max:100',
                'status' => 'required|string',
                
            ]);

            $purchase->update($validatedData);

            return redirect()->route('purchase.index')->with('success', 'Item successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = purchase::find($id);

        if(!$purchase) {
            return redirect()->route('purchase.index')->with('error', 'Item not found.');       
        }
        else {
            $purchase->delete();
            return redirect()->route('purchase.index')->with('success', 'Item successfully deleted.');
        }
    }
}
