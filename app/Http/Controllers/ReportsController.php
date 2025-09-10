<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Check if user is admin
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Unauthorized access. Only administrators can view reports.');
        }
        
        // Get current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        // Monthly statistics
        $monthlyStats = $this->getMonthlyStats($currentYear, $currentMonth);
        
        // Yearly statistics
        $yearlyStats = $this->getYearlyStats($currentYear);
        
        // Client statistics
        $clientStats = $this->getClientStats();
        
        // Invoice statistics
        $invoiceStats = $this->getInvoiceStats();
        
        // Monthly chart data
        $monthlyChartData = $this->getMonthlyChartData($currentYear);
        
        // Vehicle usage statistics
        $vehicleStats = $this->getVehicleStats();
        
        // Item statistics
        $itemStats = $this->getItemStats();

        return view('reports.index', compact(
            'monthlyStats',
            'yearlyStats', 
            'clientStats',
            'invoiceStats',
            'monthlyChartData',
            'vehicleStats',
            'itemStats',
            'currentMonth',
            'currentYear'
        ));
    }

    public function print()
    {
        // Check if user is admin
        if (auth()->user()->type !== 'admin') {
            abort(403, 'Unauthorized access. Only administrators can view reports.');
        }
        
        // Get current month and year
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        
        // Get all statistics for print
        $monthlyStats = $this->getMonthlyStats($currentYear, $currentMonth);
        $yearlyStats = $this->getYearlyStats($currentYear);
        $clientStats = $this->getClientStats();
        $invoiceStats = $this->getInvoiceStats();
        $vehicleStats = $this->getVehicleStats();
        $itemStats = $this->getItemStats();

        return view('reports.print', compact(
            'monthlyStats',
            'yearlyStats',
            'clientStats', 
            'invoiceStats',
            'vehicleStats',
            'itemStats',
            'currentMonth',
            'currentYear'
        ));
    }

    private function getMonthlyStats($year, $month)
    {
        $invoices = Invoice::whereYear('created_at', $year)
                          ->whereMonth('created_at', $month)
                          ->get();

        return [
            'total_invoices' => $invoices->count(),
            'total_amount' => $invoices->sum('amount'),
            'first_weight_count' => $invoices->where('type', 'First Weight')->count(),
            'second_weight_count' => $invoices->where('type', 'Second Weight')->count(),
            'total_weight' => $invoices->sum('re_enter_first_weight') + 
                            $invoices->sum('dummy_weight_one') + 
                            $invoices->sum('dummy_weight_two'),
            'unique_clients' => $invoices->pluck('user_id')->unique()->count(),
            'unique_vehicles' => $invoices->pluck('vehicle_name')->unique()->count()
        ];
    }

    private function getYearlyStats($year)
    {
        $invoices = Invoice::whereYear('created_at', $year)->get();

        return [
            'total_invoices' => $invoices->count(),
            'total_amount' => $invoices->sum('amount'),
            'first_weight_count' => $invoices->where('type', 'First Weight')->count(),
            'second_weight_count' => $invoices->where('type', 'Second Weight')->count(),
            'total_weight' => $invoices->sum('re_enter_first_weight') + 
                            $invoices->sum('dummy_weight_one') + 
                            $invoices->sum('dummy_weight_two'),
            'unique_clients' => $invoices->pluck('user_id')->unique()->count(),
            'unique_vehicles' => $invoices->pluck('vehicle_name')->unique()->count(),
            'monthly_breakdown' => $this->getMonthlyBreakdown($year)
        ];
    }

    private function getMonthlyBreakdown($year)
    {
        $months = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthInvoices = Invoice::whereYear('created_at', $year)
                                   ->whereMonth('created_at', $i)
                                   ->get();
            
            $months[] = [
                'month' => Carbon::create($year, $i, 1)->format('M'),
                'invoices' => $monthInvoices->count(),
                'amount' => $monthInvoices->sum('amount'),
                'weight' => $monthInvoices->sum('re_enter_first_weight') + 
                          $monthInvoices->sum('dummy_weight_one') + 
                          $monthInvoices->sum('dummy_weight_two')
            ];
        }
        return $months;
    }

    private function getClientStats()
    {
        $totalClients = User::where('type', 'client')->count();
        $activeClients = Invoice::distinct('user_id')->count('user_id');
        
        $topClients = Invoice::selectRaw('user_id, COUNT(*) as invoice_count, SUM(amount) as total_amount')
                            ->with('user')
                            ->groupBy('user_id')
                            ->orderBy('invoice_count', 'desc')
                            ->limit(5)
                            ->get();

        return [
            'total_clients' => $totalClients,
            'active_clients' => $activeClients,
            'inactive_clients' => $totalClients - $activeClients,
            'top_clients' => $topClients
        ];
    }

    private function getInvoiceStats()
    {
        $totalInvoices = Invoice::count();
        $totalAmount = Invoice::sum('amount');
        $avgAmount = $totalInvoices > 0 ? $totalAmount / $totalInvoices : 0;
        
        $typeBreakdown = Invoice::selectRaw('type, COUNT(*) as count, SUM(amount) as total_amount')
                              ->groupBy('type')
                              ->get();

        return [
            'total_invoices' => $totalInvoices,
            'total_amount' => $totalAmount,
            'average_amount' => $avgAmount,
            'type_breakdown' => $typeBreakdown
        ];
    }

    private function getMonthlyChartData($year)
    {
        $months = [];
        $invoiceData = [];
        $amountData = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $monthInvoices = Invoice::whereYear('created_at', $year)
                                   ->whereMonth('created_at', $i)
                                   ->get();
            
            $months[] = Carbon::create($year, $i, 1)->format('M');
            $invoiceData[] = $monthInvoices->count();
            $amountData[] = $monthInvoices->sum('amount');
        }
        
        return [
            'months' => $months,
            'invoices' => $invoiceData,
            'amounts' => $amountData
        ];
    }

    private function getVehicleStats()
    {
        return Invoice::selectRaw('vehicle_name, COUNT(*) as usage_count, SUM(amount) as total_amount')
                     ->groupBy('vehicle_name')
                     ->orderBy('usage_count', 'desc')
                     ->limit(10)
                     ->get();
    }

    private function getItemStats()
    {
        return Invoice::selectRaw('item_type, COUNT(*) as count, SUM(amount) as total_amount')
                     ->groupBy('item_type')
                     ->orderBy('count', 'desc')
                     ->limit(10)
                     ->get();
    }
}