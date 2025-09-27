<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Order Details') }} #{{ $order->id }}
            </h2>
            <a href="{{ route('admin.orders.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md font-medium">
                Back to Orders
            </a>
        </div>
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
                
                <!-- Order Information & Actions -->
                <div class="space-y-6">
                    <!-- Order Status Management -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Status</h3>
                            
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Current Status:</span>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                               @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                                               @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                               @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                               @elseif($order->status === 'completed') bg-green-100 text-green-800
                                               @else bg-red-100 text-red-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </div>
                                
                                <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                    @csrf
                                    @method('PATCH')
                                    
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">Update Status:</label>
                                        <select name="status" 
                                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                            <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>
                                                Pending
                                            </option>
                                            <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>
                                                Processing
                                            </option>
                                            <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>
                                                Shipped
                                            </option>
                                            <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>
                                            <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>
                                        </select>
                                        
                                        <button type="submit" 
                                                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium">
                                            Update Status
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Customer Information -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h3>
                            
                            <div class="space-y-3">
                                <div>
                                    <span class="text-sm text-gray-600">Name:</span>
                                    <p class="font-medium text-gray-900">{{ $order->user->name }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm text-gray-600">Email:</span>
                                    <p class="text-sm text-gray-900">{{ $order->user->email }}</p>
                                </div>
                                
                                <div>
                                    <span class="text-sm text-gray-600">Delivery Address:</span>
                                    <p class="text-sm text-gray-900 mt-1 p-2 bg-gray-50 rounded">
                                        {{ $order->address_text }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Details -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Order Details</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Order ID:</span>
                                    <span class="text-sm font-medium text-gray-900">#{{ $order->id }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Order Date:</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ $order->created_at->format('M d, Y H:i') }}
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Last Updated:</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ $order->updated_at->format('M d, Y H:i') }}
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Items Count:</span>
                                    <span class="text-sm font-medium text-gray-900">
                                        {{ $order->items->count() }} items
                                    </span>
                                </div>
                                
                                <div class="flex justify-between items-center pt-2 border-t border-gray-200">
                                    <span class="text-sm font-medium text-gray-600">Total Amount:</span>
                                    <span class="text-lg font-bold text-indigo-600">
                                        Rp {{ number_format($order->total, 0, ',', '.') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Status Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                            
                            <div class="space-y-2">
                                @if($order->status === 'pending')
                                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="processing">
                                        <button type="submit" 
                                                class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-3 rounded text-sm font-medium">
                                            Mark as Processing
                                        </button>
                                    </form>
                                @endif
                                
                                @if($order->status === 'processing')
                                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="shipped">
                                        <button type="submit" 
                                                class="w-full bg-purple-600 hover:bg-purple-700 text-white py-2 px-3 rounded text-sm font-medium">
                                            Mark as Shipped
                                        </button>
                                    </form>
                                @endif
                                
                                @if($order->status === 'shipped')
                                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="completed">
                                        <button type="submit" 
                                                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-3 rounded text-sm font-medium">
                                            Mark as Completed
                                        </button>
                                    </form>
                                @endif
                                
                                @if(in_array($order->status, ['pending', 'processing']))
                                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" 
                                                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-3 rounded text-sm font-medium"
                                                onclick="return confirm('Are you sure you want to cancel this order?')">
                                            Cancel Order
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>