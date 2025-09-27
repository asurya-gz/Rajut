<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Checkout') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Order Summary -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Summary</h3>
                        
                        <div class="space-y-4">
                            @foreach($cart->items as $item)
                                <div class="flex justify-between items-center">
                                    <div>
                                        <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                        <p class="text-sm text-gray-500">Qty: {{ $item->qty }}</p>
                                    </div>
                                    <p class="font-medium text-gray-900">
                                        Rp {{ number_format($item->product->price * $item->qty, 0, ',', '.') }}
                                    </p>
                                </div>
                            @endforeach
                        </div>
                        
                        <div class="border-t border-gray-200 mt-4 pt-4">
                            <div class="flex justify-between items-center">
                                <p class="text-lg font-bold text-gray-900">Total</p>
                                <p class="text-lg font-bold text-indigo-600">
                                    Rp {{ number_format($cart->total, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Shipping Information -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Shipping Information</h3>
                        
                        <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Delivery Address *
                                </label>
                                <textarea name="address_text" rows="4" required
                                          class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                          placeholder="Enter your complete delivery address...">{{ old('address_text') }}</textarea>
                                @error('address_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-yellow-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm text-yellow-700">
                                            <strong>Note:</strong> Please ensure your delivery address is complete and accurate. 
                                            Orders cannot be modified once confirmed.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4 pt-4">
                                <a href="{{ route('cart.index') }}" 
                                   class="flex-1 bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md font-medium text-center">
                                    Back to Cart
                                </a>
                                
                                <button type="submit" 
                                        class="flex-1 bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium">
                                    Place Order
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>