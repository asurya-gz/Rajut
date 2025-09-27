<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $popularProducts = Product::active()
            ->with('category')
            ->withCount('orderItems')
            ->orderByDesc('order_items_count')
            ->latest()
            ->take(8)
            ->get();

        $latestQuery = Product::active()
            ->with('category')
            ->latest();

        if ($request->search) {
            $latestQuery->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->category_id) {
            $latestQuery->where('category_id', $request->category_id);
        }

        $latestProducts = $latestQuery->paginate(12)->withQueryString();
        $categories = Category::all();

        return view('home', compact('popularProducts', 'latestProducts', 'categories'));
    }
}
