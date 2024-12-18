<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vendors = vendor::all();
        return view('pages/vendor', compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/vendor-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'vendor_name' => 'required|string|max:100',
            'vendor_email' => 'nullable|string|max:100',
            'vendor_tel' => 'nullable|string|max:20',
            'vendor_address' => 'nullable|string|max:200',
            'status' => 'required|string|max:1',
        ]); 

        $validatedData['status'] = 'A';

        $vendor = vendor::create($validatedData);

        if (!$vendor) {
            return redirect()->back()->with('error', 'Vendor not saved.');
        }

        return redirect()->route('vendor.index')->with('success', 'Vendor successfully saved.');
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
        $vendor = vendor::find($id);
        return view('pages/vendor-edit', compact('vendor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vendor = vendor::find($id);

        if (!$vendor) {
            return redirect()->back()->with('error', 'Vendor not found.');
        }

        $validatedData = $request->validate([
            'vendor_name' => 'required|string|max:100',
            'vendor_email' => 'nullable|string|max:100',
            'vendor_tel' => 'nullable|string|max:20',
            'vendor_address' => 'nullable|string|max:200',
            'status' => 'required|string|max:1',
        ]);   

        $vendor->update($validatedData);

        return redirect()->route('vendor.index')->with('success', 'Vendor successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vendor = vendor::find($id);

        if (!$vendor) {
            return redirect()->back()->with('error', 'Vendor not found.');
        }        

        $vendor->status = 'I';
        $vendor->save();

        return redirect()->route('vendor.index')->with('success', 'Vendor successfully deactivated.');
    }

    public function activate(string $id)
        {
            $vendor = vendor::find($id);

            if (!$vendor) {
                return redirect()->route('vendor.index')->with('error', 'Vendor not found.');
            }

            // Activate the vendor
            $vendor->status = 'A'; // Set status to 'A' for active
            $vendor->save();

            return redirect()->route('vendor.index')->with('success', 'Vendor successfully activated.');
        }

}
