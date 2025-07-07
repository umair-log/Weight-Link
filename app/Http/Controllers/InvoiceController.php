<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('item')->latest()->get();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $items = Item::all();
        return view('invoices.create', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'vehicle_name' => 'required',
            'customer_name' => 'required',
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
        $items = Item::all();
        return view('invoices.edit', compact('invoice', 'items'));
    }

    public function update(Request $request, Invoice $invoice)
    {
        $request->validate([
            'type' => 'required',
            'vehicle_name' => 'required',
            'customer_name' => 'required',
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
        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}
