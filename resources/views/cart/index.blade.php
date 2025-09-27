<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Shopping Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($cart && $cart->items->count() > 0)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="space-y-6">
                            @foreach($cart->items as $item)
                                <div class="flex items-center space-x-4 border-b border-gray-200 pb-4">
                                    <div class="flex-1">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $item->product->name }}</h3>
                                        <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                        <p class="text-lg font-bold text-indigo-600">
                                            Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                        </p>
                                    </div>
                                    
                                    <div class="flex items-center space-x-2">
                                        <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center space-x-2">
                                            @csrf
                                            @method('PATCH')
                                            
                                            <label class="text-sm font-medium text-gray-700">Qty:</label>
                                            <input type="number" name="qty" value="{{ $item->qty }}" 
                                                   min="1" max="{{ $item->product->stock }}" 
                                                   class="w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            
                                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded text-sm">
                                                Update
                                            </button>
                                        </form>
                                        
                                        <form method="POST" action="{{ route('cart.destroy', $item) }}" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                Remove
                                            </button>
                                        </form>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-lg font-bold text-gray-900">
                                            Rp {{ number_format($item->product->price * $item->qty, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="mt-6 border-t border-gray-200 pt-6">
                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-sm text-gray-500">Total Items: {{ $cart->item_count }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-2xl font-bold text-gray-900">
                                        Total: Rp {{ number_format($cart->total, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-between">
                                <a href="{{ route('home') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-6 py-2 rounded-md font-medium">
                                    Continue Shopping
                                </a>
                                
                                <a href="{{ route('orders.checkout') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="mb-4">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l-2.5-5M7 13h10m0 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Your cart is empty</h3>
                        <p class="text-gray-500 mb-4">Add some products to get started.</p>
                        <a href="{{ route('home') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium">
                            Browse Products
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>