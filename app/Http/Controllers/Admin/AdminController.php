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

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders', 
            'totalUsers',
            'pendingOrders',
            'recentOrders'
        ));
    }
}
