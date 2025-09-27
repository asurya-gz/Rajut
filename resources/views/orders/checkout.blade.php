<x-app-layout title="Checkout">
    <div class="min-h-screen bg-gradient-to-b from-rose-50 via-white to-white py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Progress Steps -->
            <div class="mb-8">
                <div class="flex items-center justify-center space-x-4">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full text-sm font-medium">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <span class="ml-2 text-sm font-medium text-gray-900">Keranjang</span>
                    </div>
                    <div class="w-16 h-0.5 bg-green-500"></div>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-8 h-8 bg-rose-600 text-white rounded-full text-sm font-medium">2</div>
                        <span class="ml-2 text-sm font-medium text-rose-600">Checkout</span>
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
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Checkout</h1>
                <p class="text-gray-600">Konfirmasi pesanan dan alamat pengiriman Anda</p>
            </div>

            <div class="grid lg:grid-cols-3 gap-8">
                <!-- Shipping Information -->
                <div class="lg:col-span-2">
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
                        
                        <form method="POST" action="{{ route('orders.store') }}" class="p-6 space-y-6" data-loading="Memproses pesanan...">
                            @csrf
                            
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-3">
                                    Alamat Pengiriman Lengkap *
                                </label>
                                <textarea name="address_text" rows="5" required
                                          class="w-full rounded-xl border-gray-300 shadow-sm focus:border-rose-500 focus:ring-rose-500 resize-none"
                                          placeholder="Masukkan alamat lengkap termasuk kode pos, nama jalan, nomor rumah, RT/RW, kelurahan, kecamatan, kota/kabupaten, dan provinsi...">{{ old('address_text') }}</textarea>
                                @error('address_text')
                                    <p class="mt-2 text-sm text-red-600 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            
                            <!-- Info Notice -->
                            <div class="bg-amber-50 border border-amber-200 rounded-xl p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-amber-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-semibold text-amber-800">Penting!</h3>
                                        <div class="mt-1 text-sm text-amber-700">
                                            <ul class="list-disc pl-5 space-y-1">
                                                <li>Pastikan alamat pengiriman lengkap dan akurat</li>
                                                <li>Pesanan tidak dapat diubah setelah dikonfirmasi</li>
                                                <li>Estimasi pengiriman 2-5 hari kerja</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Method -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-900 mb-3">
                                    Metode Pembayaran
                                </label>
                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <div>
                                            <p class="font-medium text-gray-900">Cash on Delivery (COD)</p>
                                            <p class="text-sm text-gray-500">Bayar saat barang diterima</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-4 pt-4">
                                <a href="{{ route('cart.index') }}" 
                                   class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-6 rounded-xl font-semibold text-center transition duration-200 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                                    </svg>
                                    Kembali ke Keranjang
                                </a>
                                
                                <button type="submit" 
                                        class="flex-1 bg-rose-600 hover:bg-rose-700 text-white py-3 px-6 rounded-xl font-semibold disabled:opacity-70 disabled:cursor-not-allowed transition duration-200 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 flex items-center justify-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span class="button-text">Konfirmasi Pesanan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-sm border border-rose-100 sticky top-8">
                        <div class="p-6 border-b border-rose-100">
                            <h2 class="text-lg font-semibold text-gray-900 flex items-center">
                                <svg class="w-5 h-5 text-rose-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                </svg>
                                Ringkasan Pesanan
                            </h2>
                        </div>
                        
                        <div class="p-6">
                            <div class="space-y-4 mb-6">
                                @foreach($cart->items as $item)
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-rose-100 to-rose-200 rounded-lg flex items-center justify-center">
                                            <svg class="w-6 h-6 text-rose-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <p class="font-medium text-gray-900 text-sm">{{ $item->product->name }}</p>
                                            <p class="text-xs text-gray-500">{{ $item->qty }} × Rp {{ number_format($item->product->price, 0, ',', '.') }}</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-semibold text-gray-900 text-sm">
                                                Rp {{ number_format($item->product->price * $item->qty, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            
                            <div class="space-y-3 border-t border-rose-100 pt-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Subtotal</span>
                                    <span class="font-medium">Rp {{ number_format($cart->total, 0, ',', '.') }}</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Ongkos Kirim</span>
                                    <span class="text-sm text-green-600 font-medium">Gratis</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-gray-600">Biaya Admin</span>
                                    <span class="text-sm text-green-600 font-medium">Gratis</span>
                                </div>
                                
                                <div class="border-t border-rose-100 pt-3">
                                    <div class="flex justify-between items-center">
                                        <span class="text-lg font-semibold text-gray-900">Total Pembayaran</span>
                                        <span class="text-xl font-bold text-rose-600">Rp {{ number_format($cart->total, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
