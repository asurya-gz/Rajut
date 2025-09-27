<x-app-layout title="Pesanan Saya">
    <div class="min-h-screen bg-gradient-to-b from-rose-50 via-white to-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Pesanan Saya</h1>
                <p class="text-gray-600">Kelola dan pantau status pesanan Anda</p>
            </div>

            @if($orders->count() > 0)
                <div class="space-y-6">
                    @foreach($orders as $order)
                        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden hover:shadow-md transition duration-200">
                            <div class="p-6">
                                <!-- Order Header -->
                                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-start mb-6">
                                    <div class="mb-4 lg:mb-0">
                                        <div class="flex items-center space-x-3 mb-2">
                                            <h3 class="text-xl font-bold text-gray-900">
                                                Pesanan #{{ $order->id }}
                                            </h3>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold
                                                       @if($order->status === 'pending') bg-amber-100 text-amber-800
                                                       @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                                                       @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                                                       @elseif($order->status === 'completed') bg-green-100 text-green-800
                                                       @else bg-red-100 text-red-800 @endif">
                                                @if($order->status === 'pending') Menunggu Konfirmasi
                                                @elseif($order->status === 'processing') Sedang Diproses
                                                @elseif($order->status === 'shipped') Dikirim
                                                @elseif($order->status === 'completed') Selesai
                                                @else {{ ucfirst($order->status) }}
                                                @endif
                                            </span>
                                        </div>
                                        <div class="flex items-center text-sm text-gray-500 space-x-4">
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                {{ $order->created_at->format('d M Y, H:i') }}
                                            </div>
                                            <div class="flex items-center">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                                </svg>
                                                {{ $order->items->count() }} item{{ $order->items->count() > 1 ? '' : '' }}
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="text-right">
                                        <p class="text-2xl font-bold text-rose-600">
                                            Rp {{ number_format($order->total, 0, ',', '.') }}
                                        </p>
                                        <p class="text-sm text-gray-500">Total Pembayaran</p>
                                    </div>
                                </div>
                                
                                <!-- Order Items -->
                                <div class="bg-gray-50 rounded-xl p-4 mb-6">
                                    <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <svg class="w-5 h-5 text-rose-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                        </svg>
                                        Item Pesanan
                                    </h4>
                                    <div class="space-y-3">
                                        @foreach($order->items->take(3) as $item)
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center space-x-3">
                                                    <div class="w-10 h-10 bg-gradient-to-br from-rose-100 to-rose-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                                        <svg class="w-5 h-5 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                        </svg>
                                                    </div>
                                                    <div>
                                                        <p class="font-medium text-gray-900">{{ $item->product->name }}</p>
                                                        <p class="text-sm text-gray-500">{{ $item->qty }} × Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                                                    </div>
                                                </div>
                                                <p class="font-semibold text-gray-900">
                                                    Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                                                </p>
                                            </div>
                                        @endforeach
                                        
                                        @if($order->items->count() > 3)
                                            <div class="text-center py-2">
                                                <p class="text-sm text-gray-500 bg-white rounded-lg py-2 px-3 inline-block">
                                                    ... dan {{ $order->items->count() - 3 }} item lainnya
                                                </p>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                
                                <!-- Order Footer -->
                                <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center space-y-4 lg:space-y-0 pt-4 border-t border-rose-100">
                                    <div class="flex items-start space-x-2">
                                        <svg class="w-5 h-5 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Alamat Pengiriman:</p>
                                            <p class="text-sm text-gray-600 mt-1">{{ Str::limit($order->address_text, 80) }}</p>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('orders.show', $order) }}" 
                                       class="inline-flex items-center bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-xl font-semibold transition duration-200 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="mt-8">
                    {{ $orders->links() }}
                </div>
            @else
                <!-- Empty State -->
                <div class="max-w-md mx-auto">
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-12 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-rose-100 rounded-full mb-6">
                                <svg class="w-10 h-10 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Pesanan</h3>
                            <p class="text-gray-600 mb-8">Anda belum memiliki pesanan. Mulai berbelanja dan temukan koleksi rajutan terbaik kami!</p>
                            <a href="{{ route('home') }}" 
                               class="inline-flex items-center bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-xl font-semibold transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Mulai Belanja
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
