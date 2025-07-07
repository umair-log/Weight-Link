@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-3">Order List</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('orders.create') }}" class="btn btn-primary mb-3">Add New Order</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Material</th>
                <th>Transport Company</th>
                <th>Truck</th>
                <th>Weight Details</th>
                {{-- <th>Extra</th>
                <th>Extra2</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->user->name ?? '-' }}</td>
                <td>{{ $order->name }}</td>
                <td>{{ $order->phone }}</td>
                <td>{{ $order->email }}</td>
                <td>{{ $order->material_for_transport }}</td>
                <td>{{ $order->transportation_company }}</td>
                <td>{{ $order->truck }}</td>
                <td>{{ $order->weight_details }}</td>
                {{-- <td>{{ $order->extra }}</td>
                <td>{{ $order->extra2 }}</td> --}}
                <td>
                    <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('orders.destroy', $order->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
