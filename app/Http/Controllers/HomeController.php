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
            ->take(4)
            ->get();

        $latestQuery = Product::active()
            ->with('category')
            ->latest();

        if ($request->search) {
            $searchTerm = $request->search;
            $latestQuery->where(function ($q) use ($searchTerm) {
                $q->where('name', 'like', '%' . $searchTerm . '%')
                  ->orWhereHas('category', function ($categoryQuery) use ($searchTerm) {
                      $categoryQuery->where('name', 'like', '%' . $searchTerm . '%');
                  });
            });
        }

        if ($request->category_id) {
            $latestQuery->where('category_id', $request->category_id);
        }

        $latestProducts = $latestQuery->take(8)->get();
        $categories = Category::all();

        return view('home', compact('popularProducts', 'latestProducts', 'categories'));
    }
}
