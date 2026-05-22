<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        $monthlyRevenue = Payment::where('status', 'verified')
           ->selectRaw("strftime('%m', verified_at) as month, SUM(amount) as total, COUNT(*) as count")
            ->whereRaw("strftime('%Y', verified_at) = ?", [now()->year])
            ->groupBy('month')
            ->get();

        $statusCounts = Order::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        $totalRevenue = Payment::where('status', 'verified')->sum('amount');
        $totalOrders = Order::count();
        $totalCustomers = User::where('role', 'customer')->count();
        $recentOrders = Order::with('user')->latest()->take(10)->get();

        return view('admin.reports.index', compact('monthlyRevenue', 'statusCounts', 'totalRevenue', 'totalOrders', 'totalCustomers', 'recentOrders'));
    }

    public function data(Request $request)
    {
        $days = $request->get('days', 30);
        
        $data = Order::selectRaw('DATE(created_at) as date, COUNT(*) as orders, SUM(total_price) as revenue')
            ->where('created_at', '>=', Carbon::now()->subDays($days))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return response()->json($data);
    }
}