<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();

        return view('admin.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('admin.customers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        Customer::create($request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'address',
        ]));

        return redirect()->route('customers.index')
            ->with('success', 'Pelanggan berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customers.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);

        return view('admin.customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $customer->customer_id . ',customer_id',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string',
        ]);

        $customer->update($request->only([
            'first_name',
            'last_name',
            'email',
            'phone',
            'address',
        ]));

        return redirect()->route('customers.index')
            ->with('success', 'Data pelanggan berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')
            ->with('success', 'Pelanggan berhasil dihapus!');
    }
}
