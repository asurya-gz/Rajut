<x-app-layout :title="$product->name">
    <div class="bg-gradient-to-br from-pink-100 via-rose-50 to-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <a href="{{ route('products.index') }}" class="inline-flex items-center text-sm font-medium text-pink-500 hover:text-pink-600 transition mb-6">
                <svg class="h-4 w-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Kembali ke Produk
            </a>

            <div class="grid gap-10 lg:grid-cols-2">
                <div>
                    <div class="rounded-3xl bg-white shadow-xl border border-pink-100 overflow-hidden">
                        <div class="h-96 bg-gradient-to-br from-pink-50 to-purple-50 flex items-center justify-center">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="text-center">
                                    <svg class="w-24 h-24 text-pink-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    <p class="text-sm font-medium text-pink-400">{{ $product->category->name }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="space-y-3">
                        <span class="inline-flex items-center rounded-full border border-pink-200 bg-pink-50 px-4 py-1 text-sm text-pink-600 font-medium">
                            {{ $product->category->name }}
                        </span>
                        <h1 class="text-4xl font-bold text-gray-900">{{ $product->name }}</h1>
                        <p class="text-3xl font-semibold text-pink-600">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-sm text-gray-500">
                            Stok tersedia: <span class="font-semibold {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }}">{{ $product->stock }}</span>
                        </p>
                    </div>

                    <div class="space-y-4 text-sm text-gray-600 leading-relaxed">
                        <p>Produk LoopE dibuat dengan pilihan bahan berkualitas dan perhatian pada setiap detail jahitan. Nikmati kenyamanan dan desain eksklusif yang siap melengkapi gaya Anda.</p>
                        <p>Hubungi tim kami bila memerlukan penyesuaian warna atau ukuran. Kami siap membantu mewujudkan rajutan favorit Anda.</p>
                    </div>

                    <div class="rounded-2xl bg-white border border-pink-100 shadow-md p-6">
                        @auth
                            @if($product->stock > 0)
                                <form method="POST" action="{{ route('cart.store') }}" class="space-y-4" data-loading="Menambahkan ke keranjang...">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    <div>
                                        <label for="qty" class="block text-sm font-semibold text-pink-500 mb-2">Jumlah</label>
                                        <input id="qty" name="qty" type="number" value="1" min="1" max="{{ $product->stock }}" class="w-32 rounded-lg border border-pink-200 bg-white focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                                    </div>

                                    <div class="flex flex-wrap gap-3">
                                        <button type="submit" class="inline-flex flex-1 items-center justify-center rounded-full bg-pink-500 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-pink-600 disabled:opacity-70 disabled:cursor-not-allowed">
                                            <span class="button-text">Tambah ke Keranjang</span>
                                        </button>
                                        <a href="{{ route('home') }}" class="inline-flex items-center justify-center rounded-full border border-pink-300 px-6 py-3 text-pink-600 font-semibold transition hover:bg-pink-50">
                                            Lanjut Belanja
                                        </a>
                                    </div>
                                </form>
                            @else
                                <div class="text-center">
                                    <p class="text-red-500 font-semibold mb-2">Stok Habis</p>
                                    <p class="text-sm text-gray-500">Hubungi kami untuk informasi ketersediaan berikutnya.</p>
                                </div>
                            @endif
                        @else
                            <div class="space-y-3 text-center">
                                <p class="text-gray-600">Masuk untuk menambahkan produk ini ke keranjang belanja.</p>
                                <div class="flex flex-wrap gap-3 justify-center">
                                    <a href="{{ route('login') }}" class="rounded-full bg-pink-500 px-6 py-3 text-white font-semibold shadow-lg transition hover:bg-pink-600">Masuk</a>
                                    <a href="{{ route('register') }}" class="rounded-full border border-pink-300 px-6 py-3 text-pink-600 font-semibold transition hover:bg-pink-50">Daftar</a>
                                </div>
                            </div>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($relatedProducts->isNotEmpty())
        <div class="py-12 bg-white">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between mb-6">
                    <h2 class="text-2xl font-semibold text-gray-900">Produk Terkait</h2>
                    <p class="text-sm text-gray-500">Pilihan lain dalam kategori {{ $product->category->name }}.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @foreach($relatedProducts as $relatedProduct)
                        <x-product-card :product="$relatedProduct" />
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
