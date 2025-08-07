<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index()
    {
        if (auth()->user()->type === 'admin') {
            $invoices = Invoice::with(['item', 'user'])->latest()->get();
        } else {
            $invoices = Invoice::with(['item', 'user'])
                            ->where('user_id', auth()->id())
                            ->latest()
                            ->get();
        }
        
        return view('invoices.index', compact('invoices'));
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

        $items = Item::all();
        $users = User::where('type', 'client')->get();
        
        return view('invoices.create', compact('items', 'trucks', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'vehicle_name' => 'required',
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'item_type' => 'required',
            'amount' => 'required|numeric',
            're_enter_first_weight' => 'required|numeric',
            'dummy_weight_one' => 'required|numeric',
            'dummy_weight_two' => 'required|numeric',
            'driver' => 'required',
        ]);

        Invoice::create($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function edit(Invoice $invoice)
    {
        // Authorization check - only admin or invoice owner can edit
        if (auth()->user()->type !== 'admin' && $invoice->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

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

        $items = Item::all();
        $users = User::where('type', 'client')->get();

        return view('invoices.edit', compact('invoice', 'items', 'trucks', 'users'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        // Authorization check - only admin or invoice owner can update
        if (auth()->user()->type !== 'admin' && $invoice->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'type' => 'required',
            'vehicle_name' => 'required',
            'user_id' => 'required|exists:users,id',
            'item_id' => 'required|exists:items,id',
            'item_type' => 'required',
            'amount' => 'required|numeric',
            're_enter_first_weight' => 'required|numeric',
            'dummy_weight_one' => 'required|numeric',
            'dummy_weight_two' => 'required|numeric',
            'driver' => 'required',
        ]);

        $invoice->update($request->all());

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy(Invoice $invoice)
    {
        // Authorization check - only admin or invoice owner can delete
        if (auth()->user()->type !== 'admin' && $invoice->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}