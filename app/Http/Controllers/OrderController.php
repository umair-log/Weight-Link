<?php
namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $query = Order::with('user')->latest();
    
        if (auth()->user()->type === 'client') {
            $query->where('user_id', auth()->id());
        }
    
        $orders = $query->get();
    
        return view('orders.index', compact('orders'));
    }
    

    public function create()
    {
        $transportCompanies = [
            'Wahid Goods Transport Company',
            'Talal Goods Transport Company Karachi',
            'Rana Brothers Container Service',
            'Mehmood Goods Transport Company',
            'Javed Enterprices Goods Transport Company',
        ];

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

        return view('orders.create', compact('transportCompanies', 'trucks'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'material_for_transport' => 'required|string',
            'transportation_company' => 'required|string',
            'truck' => 'required|string',
            'weight_details' => 'required|string',
            'extra' => 'nullable|string',
            'extra2' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        Order::create($validated);

        return redirect()->route('orders.index')->with('success', 'Order created successfully');
    }

    public function edit(Order $order)
    {
        $transportCompanies = [
            'Wahid Goods Transport Company',
            'Talal Goods Transport Company Karachi',
            'Rana Brothers Container Service',
            'Mehmood Goods Transport Company',
            'Javed Enterprices Goods Transport Company',
        ];

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

        return view('orders.edit', compact('order', 'transportCompanies', 'trucks'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'email' => 'required|email',
            'material_for_transport' => 'required|string',
            'transportation_company' => 'required|string',
            'truck' => 'required|string',
            'weight_details' => 'required|string',
            'extra' => 'nullable|string',
            'extra2' => 'nullable|string',
        ]);

        $order->update($validated);

        return redirect()->route('orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted');
    }
}
