@props(['product'])

<div class="bg-white/90 backdrop-blur-sm overflow-hidden shadow-lg rounded-2xl border border-pink-100 hover:shadow-xl transition duration-300 transform hover:-translate-y-1">
    <div class="relative h-48 bg-gradient-to-br from-pink-50 to-purple-50 overflow-hidden rounded-t-2xl">
        @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover hover:scale-105 transition duration-300">
        @else
            <div class="flex items-center justify-center h-full bg-gradient-to-br from-pink-100 to-purple-100">
                <div class="text-center">
                    <svg class="w-16 h-16 text-pink-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <p class="text-xs text-pink-400 font-medium">{{ $product->category->name }}</p>
                </div>
            </div>
        @endif

        <div class="absolute top-3 left-3">
            <span class="px-2 py-1 bg-white/90 backdrop-blur-sm text-pink-600 text-xs font-medium rounded-full shadow-sm">
                {{ $product->category->name }}
            </span>
        </div>
    </div>

    <div class="p-6">
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
        </div>

        <div class="mb-6">
            <p class="text-2xl font-bold text-pink-600 mb-1">
                Rp {{ number_format($product->price, 0, ',', '.') }}
            </p>
            <p class="text-sm text-gray-500">
                Stok: <span class="font-medium {{ $product->stock > 0 ? 'text-green-600' : 'text-red-500' }}">
                    {{ $product->stock }}
                </span>
            </p>
        </div>

        @auth
            @if($product->stock > 0)
                <form method="POST" action="{{ route('cart.store') }}" class="space-y-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <input type="number" name="qty" value="1" min="1" max="{{ $product->stock }}"
                               class="w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-400 focus:ring-pink-300 bg-pink-50/50">
                    </div>

                    <button type="submit" class="w-full bg-pink-500 hover:bg-pink-600 text-white py-2.5 px-4 rounded-lg font-medium transition duration-300 shadow-lg hover:shadow-xl">
                        Tambah ke Keranjang
                    </button>
                </form>
            @else
                <div class="text-center py-4">
                    <p class="text-red-500 font-medium">Stok Habis</p>
                </div>
            @endif
        @else
            <a href="{{ route('login') }}" class="block w-full bg-gray-500 hover:bg-gray-600 text-white py-2.5 px-4 rounded-lg font-medium text-center transition duration-300">
                Login untuk Membeli
            </a>
        @endauth
    </div>
</div>
