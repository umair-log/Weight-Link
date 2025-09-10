<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Reports - {{ Carbon\Carbon::now()->format('M d, Y') }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
            color: #333;
        }
        .report-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .report-title {
            font-size: 24px;
            color: #666;
            margin-bottom: 5px;
        }
        .report-date {
            font-size: 16px;
            color: #888;
        }
        .section {
            margin-bottom: 30px;
            page-break-inside: avoid;
        }
        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 20px;
        }
        .stat-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            background: #f9f9f9;
        }
        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 14px;
            color: #666;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }
        .table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .monthly-breakdown {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .month-card {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            background: #f9f9f9;
        }
        .month-name {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }
        .month-stats {
            font-size: 12px;
            color: #666;
        }
        .print-button {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }
        .print-button:hover {
            background: #0056b3;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 12px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
        @media print {
            .print-button {
                display: none;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .report-container {
                max-width: none;
            }
            .section {
                page-break-inside: avoid;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">🖨️ Print Report</button>
    
    <div class="report-container">
        <div class="header">
            <div class="company-name">Weigh Link</div>
            <div class="report-title">SYSTEM REPORTS & ANALYTICS</div>
            <div class="report-date">Generated on {{ Carbon\Carbon::now()->format('M d, Y \a\t h:i A') }}</div>
        </div>

        <!-- Monthly Statistics -->
        <div class="section">
            <div class="section-title">Monthly Statistics - {{ Carbon\Carbon::create($currentYear, $currentMonth, 1)->format('F Y') }}</div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ $monthlyStats['total_invoices'] }}</div>
                    <div class="stat-label">Total Invoices</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">${{ number_format($monthlyStats['total_amount'], 2) }}</div>
                    <div class="stat-label">Total Amount</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ number_format($monthlyStats['total_weight'], 2) }} kg</div>
                    <div class="stat-label">Total Weight</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $monthlyStats['unique_clients'] }}</div>
                    <div class="stat-label">Active Clients</div>
                </div>
            </div>
        </div>

        <!-- Yearly Statistics -->
        <div class="section">
            <div class="section-title">Yearly Statistics - {{ $currentYear }}</div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ $yearlyStats['total_invoices'] }}</div>
                    <div class="stat-label">Total Invoices</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">${{ number_format($yearlyStats['total_amount'], 2) }}</div>
                    <div class="stat-label">Total Revenue</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $yearlyStats['first_weight_count'] }}</div>
                    <div class="stat-label">First Weight</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $yearlyStats['second_weight_count'] }}</div>
                    <div class="stat-label">Second Weight</div>
                </div>
            </div>
        </div>

        <!-- Monthly Breakdown -->
        <div class="section">
            <div class="section-title">Monthly Breakdown - {{ $currentYear }}</div>
            <div class="monthly-breakdown">
                @foreach($yearlyStats['monthly_breakdown'] as $month)
                <div class="month-card">
                    <div class="month-name">{{ $month['month'] }}</div>
                    <div class="month-stats">
                        <div>{{ $month['invoices'] }} invoices</div>
                        <div>${{ number_format($month['amount'], 2) }}</div>
                        <div>{{ number_format($month['weight'], 2) }} kg</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Client Statistics -->
        <div class="section">
            <div class="section-title">Client Statistics</div>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-value">{{ $clientStats['total_clients'] }}</div>
                    <div class="stat-label">Total Clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $clientStats['active_clients'] }}</div>
                    <div class="stat-label">Active Clients</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value">{{ $clientStats['inactive_clients'] }}</div>
                    <div class="stat-label">Inactive Clients</div>
                </div>
            </div>
        </div>

        <!-- Top Clients -->
        <div class="section">
            <div class="section-title">Top 5 Clients by Invoice Count</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Client Name</th>
                        <th>Invoice Count</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clientStats['top_clients'] as $index => $client)
                    <tr>
                        <td>#{{ $index + 1 }}</td>
                        <td>{{ $client->user->name }}</td>
                        <td>{{ $client->invoice_count }}</td>
                        <td>${{ number_format($client->total_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Vehicle Statistics -->
        <div class="section">
            <div class="section-title">Top Vehicles by Usage</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Vehicle Name</th>
                        <th>Usage Count</th>
                        <th>Total Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehicleStats as $vehicle)
                    <tr>
                        <td>{{ $vehicle->vehicle_name }}</td>
                        <td>{{ $vehicle->usage_count }}</td>
                        <td>${{ number_format($vehicle->total_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Item Statistics -->
        <div class="section">
            <div class="section-title">Top Items by Usage</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item Type</th>
                        <th>Usage Count</th>
                        <th>Total Revenue</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemStats as $item)
                    <tr>
                        <td>{{ $item->item_type }}</td>
                        <td>{{ $item->count }}</td>
                        <td>${{ number_format($item->total_amount, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Invoice Type Breakdown -->
        <div class="section">
            <div class="section-title">Invoice Type Distribution</div>
            <table class="table">
                <thead>
                    <tr>
                        <th>Invoice Type</th>
                        <th>Count</th>
                        <th>Total Amount</th>
                        <th>Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($invoiceStats['type_breakdown'] as $type)
                    <tr>
                        <td>{{ $type->type }}</td>
                        <td>{{ $type->count }}</td>
                        <td>${{ number_format($type->total_amount, 2) }}</td>
                        <td>{{ $invoiceStats['total_invoices'] > 0 ? number_format(($type->count / $invoiceStats['total_invoices']) * 100, 1) : 0 }}%</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="footer">
            <p>This report was generated automatically by the Weigh Link System</p>
            <p>For questions or support, please contact the system administrator</p>
        </div>
    </div>

    <script>
        // Auto-print when page loads (optional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>