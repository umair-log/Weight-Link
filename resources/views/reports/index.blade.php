@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">
                        <i class="bx bx-bar-chart-alt-2 me-2"></i>System Reports & Analytics
                    </h4>
                    <a href="{{ route('reports.print') }}" class="btn btn-primary" target="_blank">
                        <i class="bx bx-printer me-1"></i>Print Reports
                    </a>
                </div>

                <div class="card-body">
                    <!-- Monthly Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">
                                <i class="bx bx-calendar me-2"></i>Monthly Statistics - {{ Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}
                            </h5>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Invoices</h6>
                                            <h3 class="mb-0">{{ $monthlyStats['total_invoices'] }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-file display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-success text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Amount</h6>
                                            <h3 class="mb-0">${{ number_format($monthlyStats['total_amount'], 2) }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-dollar display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-info text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Weight (kg)</h6>
                                            <h3 class="mb-0">{{ number_format($monthlyStats['total_weight'], 2) }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-dumbbell display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Active Clients</h6>
                                            <h3 class="mb-0">{{ $monthlyStats['unique_clients'] }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-user display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Yearly Statistics Cards -->
                    <div class="row mb-4">
                        <div class="col-12">
                            <h5 class="mb-3">
                                <i class="bx bx-calendar-check me-2"></i>Yearly Statistics - {{ $currentYear }}
                            </h5>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-dark text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Invoices</h6>
                                            <h3 class="mb-0">{{ $yearlyStats['total_invoices'] }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-file display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-secondary text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Total Revenue</h6>
                                            <h3 class="mb-0">${{ number_format($yearlyStats['total_amount'], 2) }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-dollar display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-danger text-white">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">First Weight</h6>
                                            <h3 class="mb-0">{{ $yearlyStats['first_weight_count'] }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-trending-up display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 mb-3">
                            <div class="card bg-light text-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h6 class="card-title">Second Weight</h6>
                                            <h3 class="mb-0">{{ $yearlyStats['second_weight_count'] }}</h3>
                                        </div>
                                        <div class="align-self-center">
                                            <i class="bx bx-trending-down display-4"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Charts Section -->
                    <div class="row mb-4">
                        <div class="col-lg-8 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-line-chart me-2"></i>Monthly Invoice Trends - {{ $currentYear }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="monthlyChart" height="100"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-pie-chart me-2"></i>Invoice Type Distribution
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <canvas id="typeChart" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Client Statistics -->
                    <div class="row mb-4">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-user me-2"></i>Client Statistics
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row text-center">
                                        <div class="col-4">
                                            <h4 class="text-primary">{{ $clientStats['total_clients'] }}</h4>
                                            <small class="text-muted">Total Clients</small>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-success">{{ $clientStats['active_clients'] }}</h4>
                                            <small class="text-muted">Active Clients</small>
                                        </div>
                                        <div class="col-4">
                                            <h4 class="text-warning">{{ $clientStats['inactive_clients'] }}</h4>
                                            <small class="text-muted">Inactive Clients</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-trophy me-2"></i>Top 5 Clients
                                    </h5>
                                </div>
                                <div class="card-body">
                                    @foreach($clientStats['top_clients'] as $index => $client)
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <div>
                                            <strong>{{ $client->user->name }}</strong>
                                            <br><small class="text-muted">{{ $client->invoice_count }} invoices</small>
                                        </div>
                                        <div class="text-end">
                                            <span class="badge bg-primary">#{{ $index + 1 }}</span>
                                            <br><small class="text-success">${{ number_format($client->total_amount, 2) }}</small>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle and Item Statistics -->
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-car me-2"></i>Top Vehicles by Usage
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Vehicle</th>
                                                    <th>Usage</th>
                                                    <th>Revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($vehicleStats as $vehicle)
                                                <tr>
                                                    <td>
                                                        <small class="text-truncate d-block" style="max-width: 150px;" title="{{ $vehicle->vehicle_name }}">
                                                            {{ $vehicle->vehicle_name }}
                                                        </small>
                                                    </td>
                                                    <td><span class="badge bg-info">{{ $vehicle->usage_count }}</span></td>
                                                    <td><small class="text-success">${{ number_format($vehicle->total_amount, 2) }}</small></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">
                                        <i class="bx bx-package me-2"></i>Top Items by Usage
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Item Type</th>
                                                    <th>Count</th>
                                                    <th>Revenue</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($itemStats as $item)
                                                <tr>
                                                    <td>
                                                        <small class="text-truncate d-block" style="max-width: 150px;" title="{{ $item->item_type }}">
                                                            {{ $item->item_type }}
                                                        </small>
                                                    </td>
                                                    <td><span class="badge bg-warning">{{ $item->count }}</span></td>
                                                    <td><small class="text-success">${{ number_format($item->total_amount, 2) }}</small></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Monthly Chart
const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
new Chart(monthlyCtx, {
    type: 'line',
    data: {
        labels: @json($monthlyChartData['months']),
        datasets: [{
            label: 'Invoices Count',
            data: @json($monthlyChartData['invoices']),
            borderColor: 'rgb(75, 192, 192)',
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            tension: 0.1,
            yAxisID: 'y'
        }, {
            label: 'Amount ($)',
            data: @json($monthlyChartData['amounts']),
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            tension: 0.1,
            yAxisID: 'y1'
        }]
    },
    options: {
        responsive: true,
        interaction: {
            mode: 'index',
            intersect: false,
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'Month'
                }
            },
            y: {
                type: 'linear',
                display: true,
                position: 'left',
                title: {
                    display: true,
                    text: 'Invoices Count'
                }
            },
            y1: {
                type: 'linear',
                display: true,
                position: 'right',
                title: {
                    display: true,
                    text: 'Amount ($)'
                },
                grid: {
                    drawOnChartArea: false,
                },
            }
        }
    }
});

// Type Distribution Chart
const typeCtx = document.getElementById('typeChart').getContext('2d');
new Chart(typeCtx, {
    type: 'doughnut',
    data: {
        labels: @json($invoiceStats['type_breakdown']->pluck('type')),
        datasets: [{
            data: @json($invoiceStats['type_breakdown']->pluck('count')),
            backgroundColor: [
                'rgba(54, 162, 235, 0.8)',
                'rgba(255, 206, 86, 0.8)',
                'rgba(75, 192, 192, 0.8)',
                'rgba(153, 102, 255, 0.8)',
                'rgba(255, 99, 132, 0.8)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'bottom',
            }
        }
    }
});
</script>

<style>
.card {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.5rem;
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.card-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    color: white;
    border-bottom: none;
    padding: 1rem 1.5rem;
}

.card-header h5 {
    margin: 0;
    font-weight: 600;
}

.bg-primary, .bg-success, .bg-info, .bg-warning, .bg-dark, .bg-secondary, .bg-danger, .bg-light {
    border: none;
}

.display-4 {
    font-size: 2.5rem;
    opacity: 0.8;
}

.table th {
    border-top: none;
    font-weight: 600;
    font-size: 0.875rem;
    background-color: #f8f9fa;
}

.badge {
    font-size: 0.75rem;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2rem;
    }
    
    .card-body {
        padding: 1rem;
    }
}
</style>
@endsection