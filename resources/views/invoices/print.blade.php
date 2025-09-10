<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice #{{ $invoice->id }} - Print</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background: white;
        }
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border: 1px solid #ddd;
            padding: 30px;
        }
        .header {
            text-align: center;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .company-name {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .invoice-title {
            font-size: 24px;
            color: #666;
            margin-bottom: 5px;
        }
        .invoice-number {
            font-size: 18px;
            color: #888;
        }
        .invoice-details {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .details-section {
            flex: 1;
            margin: 0 10px;
        }
        .details-section h3 {
            margin: 0 0 10px 0;
            color: #333;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            padding-bottom: 5px;
        }
        .details-section p {
            margin: 5px 0;
            color: #666;
        }
        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table th,
        .items-table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        .items-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            color: #333;
        }
        .items-table tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .totals {
            text-align: right;
            margin-top: 20px;
        }
        .total-row {
            display: flex;
            justify-content: space-between;
            margin: 5px 0;
            padding: 5px 0;
        }
        .total-label {
            font-weight: bold;
            color: #333;
        }
        .total-amount {
            font-weight: bold;
            color: #333;
        }
        .grand-total {
            border-top: 2px solid #333;
            padding-top: 10px;
            font-size: 18px;
        }
        .footer {
            margin-top: 40px;
            text-align: center;
            color: #666;
            font-size: 12px;
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
        @media print {
            .print-button {
                display: none;
            }
            body {
                margin: 0;
                padding: 0;
            }
            .invoice-container {
                border: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <button class="print-button" onclick="window.print()">🖨️ Print Invoice</button>
    
    <div class="invoice-container">
        <div class="header">
            <div class="company-name">Weigh Link</div>
            <div class="invoice-title">INVOICE</div>
            <div class="invoice-number">Invoice #{{ $invoice->id }}</div>
        </div>

        <div class="invoice-details">
            <div class="details-section">
                <h3>Invoice Details</h3>
                <p><strong>Invoice ID:</strong> {{ $invoice->id }}</p>
                <p><strong>Type:</strong> {{ $invoice->type }}</p>
                <p><strong>Date:</strong> {{ $invoice->created_at->format('M d, Y') }}</p>
                <p><strong>Time:</strong> {{ $invoice->created_at->format('h:i A') }}</p>
            </div>
            
            <div class="details-section">
                <h3>Customer Information</h3>
                <p><strong>Name:</strong> {{ $invoice->user->name }}</p>
                <p><strong>Email:</strong> {{ $invoice->user->email }}</p>
            </div>
            
            <div class="details-section">
                <h3>Vehicle & Driver</h3>
                <p><strong>Vehicle:</strong> {{ $invoice->vehicle_name }}</p>
                <p><strong>Driver:</strong> {{ $invoice->driver }}</p>
            </div>
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Item Type</th>
                    <th>First Weight</th>
                    <th>Dummy Weight 1</th>
                    <th>Dummy Weight 2</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $invoice->item->name ?? 'N/A' }}</td>
                    <td>{{ $invoice->item_type }}</td>
                    <td>{{ number_format($invoice->re_enter_first_weight, 2) }} kg</td>
                    <td>{{ number_format($invoice->dummy_weight_one, 2) }} kg</td>
                    <td>{{ number_format($invoice->dummy_weight_two, 2) }} kg</td>
                    <td>${{ number_format($invoice->amount, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <div class="totals">
            <div class="total-row">
                <span class="total-label">Subtotal:</span>
                <span class="total-amount">${{ number_format($invoice->amount, 2) }}</span>
            </div>
            <div class="total-row grand-total">
                <span class="total-label">Total Amount:</span>
                <span class="total-amount">${{ number_format($invoice->amount, 2) }}</span>
            </div>
        </div>

        <div class="footer">
            <p>Thank you for your business!</p>
            <p>Generated on {{ now()->format('M d, Y \a\t h:i A') }}</p>
        </div>
    </div>

    <script>
        // Auto-print when page loads (optional)
        // window.onload = function() { window.print(); }
    </script>
</body>
</html>