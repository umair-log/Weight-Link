<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        $trucks = [
            'Hino Truck/Mazda',
            'Hino Single Dumper 94/06',
            'Hino 7D',
            'Hino PTR number 9093 model',
            'Mitsubishi Fuso Truck',
            'Hino Damper',
            'Hino truck jo8c',
            'Fb Hino Truck',
            'Hino truck gear 8J 22 top Euro',
        ];

        $companies = [
            'Wahid Goods Transport Company',
            'Talal Goods Transport Company Karachi',
            'Rana Brothers Container Service',
            'Mehmood Goods Transport Company',
            'Javed Enterprices Goods Transport Company',
        ];

        return view('customers.create', compact('trucks', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'material_for_transport' => 'required|string',
            'transportation_company' => 'required|string',
            'truck' => 'required|string',
        ]);

        Customer::create($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    public function edit(Customer $customer)
    {
        $trucks = [
            'Hino Truck/Mazda',
            'Hino Single Dumper 94/06',
            'Hino 7D',
            'Hino PTR number 9093 model',
            'Mitsubishi Fuso Truck',
            'Hino Damper',
            'Hino truck jo8c',
            'Fb Hino Truck',
            'Hino truck gear 8J 22 top Euro',
        ];

        $companies = [
            'Wahid Goods Transport Company',
            'Talal Goods Transport Company Karachi',
            'Rana Brothers Container Service',
            'Mehmood Goods Transport Company',
            'Javed Enterprices Goods Transport Company',
        ];

        return view('customers.edit', compact('customer', 'trucks', 'companies'));
    }

    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'nullable|email',
            'material_for_transport' => 'required|string',
            'transportation_company' => 'required|string',
            'truck' => 'required|string',
        ]);

        $customer->update($request->all());

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
}
