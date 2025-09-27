<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Details') }} #{{ $order->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Order Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Items</h3>
                            
                            <div class="space-y-4">
                                @foreach($order->items as $item)
                                    <div class="flex items-center space-x-4 border-b border-gray-200 pb-4 last:border-b-0">
                                        <div class="flex-1">
                                            <h4 class="font-medium text-gray-900">{{ $item->product->name }}</h4>
                                            <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                            <p class="text-sm text-gray-600">
                                                Rp {{ number_format($item->price, 0, ',', '.') }} × {{ $item->qty }}
                                            </p>
                                        </div>
                                        
                                        <div class="text-right">
                                            <p class="font-bold text-gray-900">
                                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="border-t border-gray-200 mt-6 pt-6">
                                <div class="flex justify-between items-center">
                                    <p class="text-lg font-bold text-gray-900">Total</p>
                                    <p class="text-xl font-bold text-indigo-600">
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Information -->
                <div class="space-y-6">
                    <!-- Order Status -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Status</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                               @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                               @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                               @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                               @elseif($order->status === 'completed') bg-green-100 text-green-800
                                               @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Order Date:</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ $order->created_at->format('M d, Y H:i') }}
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Order ID:</span>
                                    <span class="text-sm font-medium text-gray-900">#{{ $order->id }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Delivery Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Delivery Information</h3>
                            
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm text-gray-600">Customer:</span>
                                    <p class="font-medium text-gray-900">{{ $order->user->name }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm text-gray-600">Delivery Address:</span>
                                    <p class="text-sm text-gray-900 mt-1">{{ $order->address_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <div class="space-y-3">
                                <a href="{{ route('orders.index') }}" 
                                   class="w-full bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md font-medium text-center block">
                                    Back to Orders
                                </a>
                                
                                @if($order->status === 'completed')
                                    <a href="{{ route('home') }}" 
                                       class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium text-center block">
                                        Order Again
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>