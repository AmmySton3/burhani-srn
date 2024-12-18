<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = customer::all();
        return view('pages/customer', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages/customer-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'nullable|string|max:100',
            'customer_tel' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:200',
            'status' => 'required|string|max:1',
        ]);

        $validatedData['status'] = 'A';

        $customer = customer::create($validatedData);

        if (!$customer) {
            return redirect()->back()->with('error', 'Customer not saved.');
        }

        return redirect()->route('customer.index')->with('success', 'Customer successfully saved.');
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
        $customer = customer::find($id);
        return view('pages/customer-edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = customer::find($id);

        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found.');
        }

        $validatedData = $request->validate([
            'customer_name' => 'required|string|max:100',
            'customer_email' => 'nullable|string|max:100',
            'customer_tel' => 'nullable|string|max:20',
            'customer_address' => 'nullable|string|max:200',
            'status' => 'required|string|max:1',
        ]);

        $customer->update($validatedData);

        return redirect()->route('customer.index')->with('success', 'Customer successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = customer::find($id);    

        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found.');
        }

        $customer->status = 'I';
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer successfully deleted.');
    }

    public function activate(string $id)
    {
        $customer = customer::find($id);

        if (!$customer) {
            return redirect()->route('customer.index')->with('error', 'Customer not found.');
        }

        // Activate the customer
        $customer->status = 'A'; // Set status to 'A' for active
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer successfully activated.');
    }

}
