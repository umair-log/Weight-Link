@include('layouts.header')
@include('layouts.sidebar')
@include('layouts.topbar') 

<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2 row-cols-xxl-4">
            <h4>Customer List</h4>
            @if(auth()->check() && auth()->user()->type === 'admin')
            <a href="{{ route('customers.create') }}" class="btn btn-success mb-3">+ Add New Customer</a>
            @endif


    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                {{-- <th>#</th> --}}
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Material</th>
                <th>Company</th>
                <th>Truck</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $index => $customer)
            <tr>
                {{-- <td>{{ $index + 1 }}</td> --}}
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->material_for_transport }}</td>
                <td>{{ $customer->transportation_company }}</td>
                <td>{{ $customer->truck }}</td>
                <td>
                    @if(auth()->check() && auth()->user()->type === 'admin')
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-sm btn-primary">Edit</a>
                    <form action="{{ route('customers.destroy', $customer) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this customer?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    @else
                    <p>No Action Available</p>

                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
</div>
@include('layouts.footer')
