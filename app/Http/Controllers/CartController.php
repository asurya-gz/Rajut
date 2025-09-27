<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cart = Auth::user()->cart()->with('items.product')->first();
        
        if (!$cart) {
            $cart = Auth::user()->cart()->create();
        }

        return view('cart.index', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'qty' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        
        if ($product->stock < $request->qty) {
            return back()->with('error', 'Stock tidak mencukupi');
        }

        $cart = Auth::user()->cart()->firstOrCreate();
        $cartItem = $cart->items()->where('product_id', $request->product_id)->first();

        if ($cartItem) {
            $newQty = $cartItem->qty + $request->qty;
            if ($product->stock < $newQty) {
                return back()->with('error', 'Stock tidak mencukupi');
            }
            $cartItem->update(['qty' => $newQty]);
        } else {
            $cart->items()->create([
                'product_id' => $request->product_id,
                'qty' => $request->qty
            ]);
        }

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang');
    }

    public function update(Request $request, CartItem $cartItem)
    {
        $request->validate([
            'qty' => 'required|integer|min:1'
        ]);

        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        if ($cartItem->product->stock < $request->qty) {
            return back()->with('error', 'Stock tidak mencukupi');
        }

        $cartItem->update(['qty' => $request->qty]);

        return back()->with('success', 'Keranjang berhasil diperbarui');
    }

    public function destroy(CartItem $cartItem)
    {
        if ($cartItem->cart->user_id !== Auth::id()) {
            abort(403);
        }

        $cartItem->delete();

        return back()->with('success', 'Item berhasil dihapus dari keranjang');
    }
}
