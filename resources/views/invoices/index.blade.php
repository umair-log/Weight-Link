@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Invoices</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('invoices.create') }}" class="btn btn-sm btn-primary mb-3">+ Add Invoice</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Type</th>
                <th>Vehicle</th>
                <th>Customer</th>
                <th>Item</th>
                <th>Item Type</th>
                <th>Amount</th>
                <th>Weight</th>
                <th>Driver</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($invoices as $invoice)
            <tr>
                <td>{{ $invoice->type }}</td>
                <td>{{ $invoice->vehicle_name }}</td>
                <td>{{ $invoice->customer_name }}</td>
                <td>{{ $invoice->item->name ?? '-' }}</td>
                <td>{{ $invoice->item_type }}</td>
                <td>{{ $invoice->amount }}</td>
                <td>{{ $invoice->re_enter_first_weight }} / {{ $invoice->dummy_weight_one }} / {{ $invoice->dummy_weight_two }}</td>
                <td>{{ $invoice->driver }}</td>
                <td>
                    <a href="{{ route('invoices.edit', $invoice) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('invoices.destroy', $invoice) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this invoice?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
