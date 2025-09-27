<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Auth::user()->orders()->with('items.product')->latest()->paginate(10);
        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        $order->load('items.product');
        return view('orders.show', compact('order'));
    }

    public function checkout()
    {
        $cart = Auth::user()->cart()->with('items.product')->first();
        
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        return view('orders.checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_text' => 'required|string|max:1000'
        ]);

        $cart = Auth::user()->cart()->with('items.product')->first();
        
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong');
        }

        // Check stock availability
        foreach ($cart->items as $item) {
            if ($item->product->stock < $item->qty) {
                return back()->with('error', "Stock {$item->product->name} tidak mencukupi");
            }
        }

        DB::transaction(function () use ($request, $cart) {
            $total = $cart->items->sum(function ($item) {
                return $item->product->price * $item->qty;
            });

            $order = Order::create([
                'user_id' => Auth::id(),
                'total' => $total,
                'address_text' => $request->address_text,
                'status' => 'pending'
            ]);

            foreach ($cart->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'price' => $item->product->price,
                    'qty' => $item->qty,
                    'subtotal' => $item->product->price * $item->qty
                ]);

                // Update stock
                $item->product->decrement('stock', $item->qty);
            }

            // Clear cart
            $cart->items()->delete();
        });

        return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat');
    }
}
