<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count();
        $pendingOrders = Order::where('status', 'pending')->count();

        $recentOrders = Order::with('user')->latest()->take(5)->get();

        // Order status distribution for pie chart
        $orderStatusData = [
            'pending' => Order::where('status', 'pending')->count(),
            'processing' => Order::where('status', 'processing')->count(),
            'shipped' => Order::where('status', 'shipped')->count(),
            'completed' => Order::where('status', 'completed')->count(),
            'cancelled' => Order::where('status', 'cancelled')->count(),
        ];

        // Monthly sales data for the last 6 months
        $monthlySales = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $sales = Order::whereYear('created_at', $month->year)
                         ->whereMonth('created_at', $month->month)
                         ->where('status', '!=', 'cancelled')
                         ->sum('total');
            $monthlySales[$month->format('M Y')] = $sales;
        }

        // Daily sales for the last 7 days
        $dailySales = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i);
            $sales = Order::whereDate('created_at', $date->toDateString())
                         ->where('status', '!=', 'cancelled')
                         ->sum('total');
            $dailySales[$date->format('M j')] = $sales;
        }

        // Total revenue
        $totalRevenue = Order::where('status', '!=', 'cancelled')->sum('total');

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders', 
            'totalUsers',
            'pendingOrders',
            'recentOrders',
            'orderStatusData',
            'monthlySales',
            'dailySales',
            'totalRevenue'
        ));
    }
}
