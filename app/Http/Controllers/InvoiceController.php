<?php
namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\User;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Invoice::with(['item', 'user']);
        
        // Role-based filtering
        if (auth()->user()->type !== 'admin') {
            $query->where('user_id', auth()->id());
        }
        
        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('type', 'like', "%{$search}%")
                  ->orWhere('vehicle_name', 'like', "%{$search}%")
                  ->orWhere('driver', 'like', "%{$search}%")
                  ->orWhere('item_type', 'like', "%{$search}%")
                  ->orWhereHas('user', function($userQuery) use ($search) {
                      $userQuery->where('name', 'like', "%{$search}%")
                               ->orWhere('email', 'like', "%{$search}%");
                  })
                  ->orWhereHas('item', function($itemQuery) use ($search) {
                      $itemQuery->where('name', 'like', "%{$search}%");
                  });
            });
        }
        
        // Filter by type
        if ($request->filled('type_filter')) {
            $query->where('type', $request->type_filter);
        }
        
        // Filter by vehicle
        if ($request->filled('vehicle_filter')) {
            $query->where('vehicle_name', $request->vehicle_filter);
        }
        
        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        $invoices = $query->latest()->paginate(15);
        
        // Get filter options for dropdowns
        $vehicleOptions = Invoice::distinct()->pluck('vehicle_name')->filter();
        $typeOptions = Invoice::distinct()->pluck('type')->filter();
        
        return view('invoices.index', compact('invoices', 'vehicleOptions', 'typeOptions'));
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

    public function show(Invoice $invoice)
    {
        // Authorization check - only admin or invoice owner can view
        if (auth()->user()->type !== 'admin' && $invoice->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('invoices.show', compact('invoice'));
    }

    public function print(Invoice $invoice)
    {
        // Authorization check - only admin or invoice owner can print
        if (auth()->user()->type !== 'admin' && $invoice->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        
        return view('invoices.print', compact('invoice'));
    }

    public function edit(Invoice $invoice)
    {
        // Authorization check - only admin can edit, clients cannot edit
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Unauthorized action. Only administrators can edit invoices.');
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
        // Authorization check - only admin can update
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Unauthorized action. Only administrators can update invoices.');
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
        // Authorization check - only admin can delete
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Unauthorized action. Only administrators can delete invoices.');
        }

        $invoice->delete();
        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
}