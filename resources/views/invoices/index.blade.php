@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bx bx-file me-2"></i>Invoices Management
                    </h4>
                    <a href="{{ route('invoices.create') }}" class="btn btn-primary">
                        <i class="bx bx-plus me-1"></i>Add New Invoice
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        <i class="bx bx-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <div class="card-body">
                    <!-- Search and Filter Section -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <form method="GET" action="{{ route('invoices.index') }}" class="row g-3">
                                <div class="col-lg-3 col-md-6">
                                    <label for="search" class="form-label">Search</label>
                                    <input type="text" class="form-control" id="search" name="search" 
                                           value="{{ request('search') }}" placeholder="Search invoices...">
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label for="type_filter" class="form-label">Type</label>
                                    <select class="form-select" id="type_filter" name="type_filter">
                                        <option value="">All Types</option>
                                        @foreach($typeOptions as $type)
                                            <option value="{{ $type }}" {{ request('type_filter') == $type ? 'selected' : '' }}>
                                                {{ $type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label for="vehicle_filter" class="form-label">Vehicle</label>
                                    <select class="form-select" id="vehicle_filter" name="vehicle_filter">
                                        <option value="">All Vehicles</option>
                                        @foreach($vehicleOptions as $vehicle)
                                            <option value="{{ $vehicle }}" {{ request('vehicle_filter') == $vehicle ? 'selected' : '' }}>
                                                {{ $vehicle }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label for="date_from" class="form-label">From Date</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" 
                                           value="{{ request('date_from') }}">
                                </div>
                                <div class="col-lg-2 col-md-6">
                                    <label for="date_to" class="form-label">To Date</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" 
                                           value="{{ request('date_to') }}">
                                </div>
                                <div class="col-lg-1 col-md-12">
                                    <label class="form-label d-none d-lg-block">&nbsp;</label>
                                    <div class="d-flex gap-2 justify-content-center justify-content-lg-start">
                                        <button type="submit" class="btn btn-outline-primary btn-sm" title="Search">
                                            <i class="bx bx-search"></i>
                                        </button>
                                        <a href="{{ route('invoices.index') }}" class="btn btn-outline-secondary btn-sm" title="Clear Filters">
                                            <i class="bx bx-x"></i>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Invoices Table -->
                    <div class="table-responsive" style="overflow-x: auto; -webkit-overflow-scrolling: touch;">
                        <table class="table table-hover" style="min-width: 1200px;">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Vehicle</th>
                                    <th>Customer</th>
                                    <th>Item</th>
                                    <th>Amount</th>
                                    <th>Weights (kg)</th>
                                    <th>Driver</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($invoices as $invoice)
                                <tr>
                                    <td style="min-width: 80px;">
                                        <span class="badge bg-primary">#{{ $invoice->id }}</span>
                                    </td>
                                    <td style="min-width: 120px;">
                                        <span class="badge bg-{{ $invoice->type == 'First Weight' ? 'success' : 'info' }}">
                                            {{ $invoice->type }}
                                        </span>
                                    </td>
                                    <td style="min-width: 150px;">
                                        <div class="text-truncate" title="{{ $invoice->vehicle_name }}">
                                            {{ $invoice->vehicle_name }}
                                        </div>
                                    </td>
                                    <td style="min-width: 180px;">
                                        <div>
                                            <strong>{{ $invoice->user->name }}</strong>
                                            <br><small class="text-muted">{{ $invoice->user->email }}</small>
                                        </div>
                                    </td>
                                    <td style="min-width: 160px;">
                                        <div>
                                            <strong>{{ $invoice->item->name ?? 'N/A' }}</strong>
                                            <br><small class="text-muted">{{ $invoice->item_type }}</small>
                                        </div>
                                    </td>
                                    <td style="min-width: 100px;">
                                        <strong class="text-success">${{ number_format($invoice->amount, 2) }}</strong>
                                    </td>
                                    <td style="min-width: 140px;">
                                        <div class="small">
                                            <div><strong>First:</strong> {{ number_format($invoice->re_enter_first_weight, 2) }} kg</div>
                                            <div><strong>Dummy 1:</strong> {{ number_format($invoice->dummy_weight_one, 2) }} kg</div>
                                            <div><strong>Dummy 2:</strong> {{ number_format($invoice->dummy_weight_two, 2) }} kg</div>
                                        </div>
                                    </td>
                                    <td style="min-width: 120px;">{{ $invoice->driver }}</td>
                                    <td style="min-width: 120px;">
                                        <div class="small">
                                            {{ $invoice->created_at->format('M d, Y') }}<br>
                                            {{ $invoice->created_at->format('h:i A') }}
                                        </div>
                                    </td>
                                    <td style="min-width: 150px;">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('invoices.print', $invoice) }}" 
                                               class="btn btn-sm btn-outline-primary" title="Print">
                                                <i class="bx bx-printer"></i>
                                            </a>
                                            @if(auth()->user()->type === 'admin')
                                                <a href="{{ route('invoices.edit', $invoice) }}" 
                                                   class="btn btn-sm btn-outline-warning" title="Edit">
                                                    <i class="bx bx-edit"></i>
                                                </a>
                                                <form action="{{ route('invoices.destroy', $invoice) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Are you sure you want to delete this invoice?')">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                        <i class="bx bx-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="bx bx-file-blank display-4"></i>
                                            <p class="mt-2">No invoices found</p>
                                            @if(request()->hasAny(['search', 'type_filter', 'vehicle_filter', 'date_from', 'date_to']))
                                                <a href="{{ route('invoices.index') }}" class="btn btn-outline-primary">
                                                    Clear Filters
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($invoices->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $invoices->appends(request()->query())->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Card Styling */
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
    overflow: hidden;
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom: none;
    padding: 1.25rem 1.5rem;
}

.card-header h4 {
    margin: 0;
    font-weight: 600;
}

.card-body {
    padding: 1.5rem;
}

/* Form Styling */
.form-label {
    font-weight: 500;
    color: #495057;
    margin-bottom: 0.5rem;
}

.form-control, .form-select {
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}

.form-control:focus, .form-select:focus {
    border-color: #86b7fe;
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
}

/* Button Styling */
.btn {
    border-radius: 0.375rem;
    font-weight: 500;
    transition: all 0.15s ease-in-out;
}

.btn-outline-primary {
    border-color: #0d6efd;
    color: #0d6efd;
}

.btn-outline-primary:hover {
    background-color: #0d6efd;
    border-color: #0d6efd;
    color: white;
}

.btn-outline-secondary {
    border-color: #6c757d;
    color: #6c757d;
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    border-color: #6c757d;
    color: white;
}

/* Table Styling */
.table th {
    border-top: none;
    font-weight: 600;
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    background-color: #343a40;
    color: white;
    padding: 1rem 0.75rem;
    white-space: nowrap;
    position: sticky;
    top: 0;
    z-index: 10;
}

.table td {
    vertical-align: middle;
    font-size: 0.875rem;
    padding: 0.75rem;
    border-color: #dee2e6;
    white-space: nowrap;
}

.table-hover tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.025);
}

.table-responsive {
    border-radius: 0.375rem;
    overflow: hidden;
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

/* Horizontal Scroll Styling */
.table-responsive::-webkit-scrollbar {
    height: 8px;
}

.table-responsive::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.table-responsive::-webkit-scrollbar-thumb:hover {
    background: #555;
}

/* Text truncation for long content */
.text-truncate {
    max-width: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

/* Badge Styling */
.badge {
    font-size: 0.75rem;
    padding: 0.375rem 0.75rem;
    border-radius: 0.375rem;
}

/* Action Buttons */
.btn-group .btn {
    margin-right: 2px;
    border-radius: 0.25rem;
}

.btn-sm {
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
}

/* Filter Section */
.filter-section {
    background-color: #f8f9fa;
    border-radius: 0.5rem;
    padding: 1.5rem;
    margin-bottom: 1.5rem;
    border: 1px solid #e9ecef;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-body {
        padding: 1rem;
    }
    
    .table-responsive {
        font-size: 0.8rem;
    }
    
    .btn-group .btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
    }
    
    .form-control, .form-select {
        font-size: 0.875rem;
    }
    
    .card-header {
        padding: 1rem;
    }
    
    .card-header h4 {
        font-size: 1.1rem;
    }
}

@media (max-width: 576px) {
    .d-flex.gap-2 {
        flex-direction: column;
        gap: 0.5rem !important;
    }
    
    .btn-sm {
        width: 100%;
    }
}

/* Empty State */
.text-muted .display-4 {
    font-size: 3rem;
    color: #6c757d;
}

/* Pagination */
.pagination {
    margin-bottom: 0;
}

.pagination .page-link {
    border-radius: 0.375rem;
    margin: 0 0.125rem;
    border: 1px solid #dee2e6;
    color: #0d6efd;
}

.pagination .page-link:hover {
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.pagination .page-item.active .page-link {
    background-color: #0d6efd;
    border-color: #0d6efd;
}
</style>
@endsection
