<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\purchase;
use App\Models\Asset;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::all();
        return view('pages/purchase', compact('purchases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/purchase-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $validatedData = $request->validate([
            'serial_no' => 'required|string|max:20',
            'model_no' => 'required|string|max:20',
            'name' => 'required|string|max:100',
            'company' => 'required|string|max:100',
            'invoice_no' => 'nullable|string|max:100',
            'date_of_purchase' => 'required|date',
            'vendor' => 'required|string|max:100',
            'status' => 'required|string|max:1',
            'remarks'=> 'nullable|string|max:200',

        ]);

        $validatedData['status'] = 'P';

        $purchases = purchase::create($validatedData);

        if (!$purchases) {
            return redirect()->back()->with('error', 'Item not saved.');
        }

        $asset = Asset::create([
            'serial_no' => $purchases->serial_no,

        ]);

        return redirect()->route('purchase.index')->with('success', 'Item successfully saved.');
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
        $purchase = Purchase::find($id);
        return view('pages/purchase-edit', ['purchase' => $purchase]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $purchase = Purchase::find($id);

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
                'vendor' => 'required|string|max:100',
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
        $purchase = Purchase::find($id);

        if(!$purchase) {
            return redirect()->route('purchase.index')->with('error', 'Item not found.');       
        }
        else {
            $purchase->delete();
            return redirect()->route('purchase.index')->with('success', 'Item successfully deleted.');
        }
    }
}
