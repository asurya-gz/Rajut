<x-app-layout title="Detail Pesanan">
    <div class="min-h-screen bg-gradient-to-b from-rose-50 via-white to-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 0h.01M9 16h.01" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Detail Pesanan #{{ $order->id }}</h1>
                <p class="text-gray-600">Informasi lengkap pesanan Anda</p>
            </div>

            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('orders.index') }}" 
                   class="inline-flex items-center text-rose-600 hover:text-rose-700 font-medium transition duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Daftar Pesanan
                </a>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Order Items -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-6 border-b border-rose-100">
                            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-rose-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                </svg>
                                Item Pesanan ({{ $order->items->count() }})
                            </h2>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-6">
                                @foreach($order->items as $item)
                                    <div class="flex items-center space-x-4 pb-6 border-b border-rose-100 last:border-b-0 last:pb-0">
                                        <!-- Product Image Placeholder -->
                                        <div class="flex-shrink-0 w-16 h-16 bg-gradient-to-br from-rose-100 to-rose-200 rounded-xl flex items-center justify-center">
                                            <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        
                                        <!-- Product Details -->
                                        <div class="flex-1 min-w-0">
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->product->name }}</h3>
                                            <p class="text-sm text-gray-500 mb-2">{{ $item->product->category->name }}</p>
                                            <div class="flex items-center space-x-3">
                                                <span class="text-rose-600 font-medium">
                                                    Rp {{ number_format($item->price, 0, ',', '.') }}
                                                </span>
                                                <span class="text-gray-400">×</span>
                                                <span class="bg-gray-100 px-2 py-1 rounded-lg text-sm font-medium">
                                                    {{ $item->qty }}
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <!-- Item Total -->
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-900">
                                                Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <!-- Order Total -->
                            <div class="mt-6 pt-6 border-t border-rose-100">
                                <div class="bg-rose-50 rounded-xl p-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-semibold text-gray-900">Total Pembayaran</span>
                                        <span class="text-2xl font-bold text-rose-600">
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Order Information -->
                <div class="space-y-6">
                    <!-- Order Status -->
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-6 border-b border-rose-100">
                            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-rose-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status Pesanan
                            </h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <div class="text-center">
                                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                           @if($order->status === 'pending') bg-amber-100 text-amber-800
                                           @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                           @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                           @elseif($order->status === 'completed') bg-green-100 text-green-800
                                           @else bg-red-100 text-red-800 @endif">
                                    @if($order->status === 'pending')
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Menunggu Konfirmasi
                                    @elseif($order->status === 'processing')
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Sedang Diproses
                                    @elseif($order->status === 'shipped')
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Dikirim
                                    @elseif($order->status === 'completed')
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Selesai
                                    @else
                                        {{ ucfirst($order->status) }}
                                    @endif
                                </span>
                            </div>
                            
                            <div class="space-y-3">
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                        </svg>
                                        ID Pesanan
                                    </span>
                                    <span class="font-medium text-gray-900">#{{ $order->id }}</span>
                                </div>
                                
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-gray-600 flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Tanggal Pesan
                                    </span>
                                    <span class="font-medium text-gray-900">
                                        {{ $order->created_at->format('d M Y, H:i') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Delivery Information -->
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-6 border-b border-rose-100">
                            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-rose-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Informasi Pengiriman
                            </h2>
                        </div>
                        
                        <div class="p-6 space-y-4">
                            <div>
                                <label class="text-sm font-medium text-gray-700 flex items-center mb-1">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    Penerima
                                </label>
                                <p class="text-gray-900 font-medium">{{ $order->user->name }}</p>
                            </div>
                            
                            <div>
                                <label class="text-sm font-medium text-gray-700 flex items-center mb-2">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    Alamat Pengiriman
                                </label>
                                <div class="bg-gray-50 rounded-lg p-3">
                                    <p class="text-sm text-gray-900 leading-relaxed">{{ $order->address_text }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Actions -->
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-6">
                            <div class="space-y-3">
                                @if($order->status === 'completed')
                                    <a href="{{ route('home') }}" 
                                       class="w-full bg-rose-600 hover:bg-rose-700 text-white py-3 px-4 rounded-xl font-semibold text-center block transition duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5 flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                        </svg>
                                        Pesan Lagi
                                    </a>
                                @endif
                                
                                <a href="{{ route('home') }}" 
                                   class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-4 rounded-xl font-medium text-center block transition duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    Lanjut Belanja
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
