<x-app-layout title="Keranjang Belanja">
    <div class="min-h-screen bg-gradient-to-b from-rose-50 via-white to-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 bg-rose-600 text-white rounded-full text-sm font-medium">1</div>
                        <span class="ml-2 text-sm font-medium text-rose-600">Keranjang</span>
                    </div>
                    <div class="w-16 h-0.5 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 bg-gray-300 text-gray-600 rounded-full text-sm font-medium">2</div>
                        <span class="ml-2 text-sm font-medium text-gray-500">Checkout</span>
                    </div>
                    <div class="w-16 h-0.5 bg-gray-300"></div>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 bg-gray-300 text-gray-600 rounded-full text-sm font-medium">3</div>
                        <span class="ml-2 text-sm font-medium text-gray-500">Pembayaran</span>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-rose-100 rounded-full mb-4">
                    <svg class="w-8 h-8 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l-2.5-5M7 13h10m0 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Keranjang Belanja</h1>
                <p class="text-gray-600">Review dan kelola produk pilihan Anda</p>
            </div>

            @if($cart && $cart->items->count() > 0)
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Cart Items -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                            <div class="p-6 border-b border-rose-100">
                                <h2 class="text-lg font-semibold text-gray-900">Item Keranjang ({{ $cart->items->count() }})</h2>
                            </div>
                            
                            <div class="divide-y divide-rose-100">
                                @foreach($cart->items as $item)
                                    <div class="p-6 hover:bg-rose-50/50 transition duration-200">
                                        <div class="flex items-start space-x-4">
                                            <!-- Product Image Placeholder -->
                                            <div class="flex-shrink-0 w-20 h-20 bg-gradient-to-br from-rose-100 to-rose-200 rounded-xl flex items-center justify-center">
                                                <svg class="w-8 h-8 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                                </svg>
                                            </div>
                                            
                                            <!-- Product Details -->
                                            <div class="flex-1 min-w-0">
                                                <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $item->product->name }}</h3>
                                                <p class="text-sm text-gray-500 mb-2">{{ $item->product->category->name }}</p>
                                                <div class="flex items-center space-x-4">
                                                    <span class="text-lg font-bold text-rose-600">
                                                        Rp {{ number_format($item->product->price, 0, ',', '.') }}
                                                    </span>
                                                    <span class="text-sm text-gray-500">per item</span>
                                                </div>
                                            </div>
                                            
                                            <!-- Quantity Controls -->
                                            <div class="flex-shrink-0">
                                                <form method="POST" action="{{ route('cart.update', $item) }}" class="flex items-center space-x-3 mb-3" data-loading="Memperbarui...">
                                                    @csrf
                                                    @method('PATCH')
                                                    
                                                    <div class="flex items-center border border-gray-300 rounded-lg">
                                                        <input type="number" name="qty" value="{{ $item->qty }}" 
                                                               min="1" max="{{ $item->product->stock }}" 
                                                               class="w-16 py-2 px-3 text-center border-none rounded-lg focus:ring-2 focus:ring-rose-500 focus:border-transparent">
                                                    </div>
                                                    
                                                    <button type="submit" class="bg-rose-600 hover:bg-rose-700 text-white px-3 py-2 rounded-lg text-sm font-medium transition duration-200 disabled:opacity-70 disabled:cursor-not-allowed">
                                                        <span class="button-text">Update</span>
                                                    </button>
                                                </form>
                                                
                                                <!-- Remove Button -->
                                                <form method="POST" action="{{ route('cart.destroy', $item) }}" class="inline" data-loading="Menghapus...">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium transition duration-200 disabled:opacity-70 disabled:cursor-not-allowed"
                                                            onclick="return confirm('Yakin ingin menghapus item ini?')">
                                                        <span class="button-text">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                            
                                            <!-- Item Total -->
                                            <div class="flex-shrink-0 text-right">
                                                <p class="text-lg font-bold text-gray-900">
                                                    Rp {{ number_format($item->product->price * $item->qty, 0, ',', '.') }}
                                                </p>
                                                <p class="text-sm text-gray-500">{{ $item->qty }} × Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Summary -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-sm border border-rose-100 sticky top-8">
                            <div class="p-6 border-b border-rose-100">
                                <h2 class="text-lg font-semibold text-gray-900">Ringkasan Pesanan</h2>
                            </div>
                            
                            <div class="p-6 space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Total Item</span>
                                    <span class="font-medium">{{ $cart->item_count }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium">Rp {{ number_format($cart->total, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Ongkos Kirim</span>
                                    <span class="text-sm text-green-600 font-medium">Gratis</span>
                                </div>
                                
                                <div class="border-t border-rose-100 pt-4">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-semibold text-gray-900">Total</span>
                                        <span class="text-xl font-bold text-rose-600">Rp {{ number_format($cart->total, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="p-6 border-t border-rose-100 space-y-3">
                                <a href="{{ route('orders.checkout') }}" 
                                   class="w-full bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-xl font-semibold text-center block transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5" 
                                   data-loading="Memuat checkout...">
                                    Lanjut ke Checkout
                                </a>
                                
                                <a href="{{ route('home') }}" 
                                   class="w-full bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-3 rounded-xl font-medium text-center block transition duration-200">
                                    Lanjut Belanja
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- Empty Cart -->
                <div class="max-w-md mx-auto">
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 overflow-hidden">
                        <div class="p-12 text-center">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-rose-100 rounded-full mb-6">
                                <svg class="w-10 h-10 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-2.5 5M7 13l-2.5-5M7 13h10m0 0v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6m8 0V9a2 2 0 00-2-2H9a2 2 0 00-2 2v4.01" />
                                </svg>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Keranjang Anda Kosong</h3>
                            <p class="text-gray-600 mb-8">Mulai berbelanja dan temukan koleksi rajutan terbaik kami</p>
                            <a href="{{ route('home') }}" 
                               class="inline-flex items-center bg-rose-600 hover:bg-rose-700 text-white px-6 py-3 rounded-xl font-semibold transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Jelajahi Produk
                            </a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
