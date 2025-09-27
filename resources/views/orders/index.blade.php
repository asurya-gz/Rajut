<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6">
                                <div class="flex justify-between items-start mb-4">
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">
                                            Order #{{ $order->id }}
                                        </h3>
                                        <p class="text-sm text-gray-500">
                                            Ordered on {{ $order->created_at->format('M d, Y H:i') }}
                                        </p>
                                    </div>
                                    
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                   @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                                   @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                   @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                                   @elseif($order->status === 'completed') bg-green-100 text-green-800
                                                   @else bg-red-100 text-red-800 @endif">
                                            {{ ucfirst($order->status) }}
                                        </span>
                                        <p class="text-lg font-bold text-gray-900 mt-1">
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
                                        </p>
                                    </div>
                                </div>
                                
                                <div class="border-t border-gray-200 pt-4">
                                    <div class="space-y-2">
                                        @foreach($order->items->take(3) as $item)
                                            <div class="flex justify-between items-center text-sm">
                                                <span class="text-gray-600">{{ $item->product->name }} ({{ $item->qty }}x)</span>
                                                <span class="text-gray-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</span>
                                            </div>
                                        @endforeach
                                        
                                        @if($order->items->count() > 3)
                                            <p class="text-sm text-gray-500">
                                                ... and {{ $order->items->count() - 3 }} more items
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="flex justify-between items-center mt-4 pt-4 border-t border-gray-200">
                                    <div class="text-sm text-gray-600">
                                        <strong>Delivery Address:</strong><br>
                                        {{ Str::limit($order->address_text, 60) }}
                                    </div>
                                    
                                    <a href="{{ route('orders.show', $order) }}" 
                                       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <div class="mt-6">
                    {{ $orders->links() }}
                </div>
            @else
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-center">
                        <div class="mb-4">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">No orders yet</h3>
                        <p class="text-gray-500 mb-4">You haven't placed any orders yet. Start shopping to see your orders here.</p>
                        <a href="{{ route('home') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-md font-medium">
                            Start Shopping
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>