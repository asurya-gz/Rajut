<x-app-layout title="Produk">
    <div class="bg-gradient-to-br from-pink-100 via-rose-50 to-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6 mb-10">
                <div>
                    <h1 class="text-4xl font-bold text-gray-900 mb-3">Jelajahi Semua Produk LoopE</h1>
                    <p class="text-gray-600 max-w-2xl">
                        Temukan rajutan handmade favoritmu. Gunakan pencarian dan filter kategori di bawah untuk
                        mempercepat pencarian produk.
                    </p>
                </div>
                <div class="flex items-center gap-3 bg-white/80 rounded-full border border-pink-100 px-5 py-3 shadow-lg">
                    <div class="h-10 w-10 flex items-center justify-center rounded-full bg-pink-500 text-white text-sm font-semibold">
                        {{ $products->total() }}
                    </div>
                    <span class="text-sm font-medium text-pink-600">Total Produk Tersedia</span>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur rounded-3xl border border-pink-100 shadow-xl mb-10">
                <div class="p-6">
                    <form method="GET" action="{{ route('products.index') }}" class="grid gap-4 md:grid-cols-[1.5fr,1fr,auto]">
                        <div class="col-span-full md:col-span-1">
                            <label for="search" class="sr-only">Cari Produk</label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-3 flex items-center text-pink-400">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </span>
                                <input id="search" type="text" name="search" value="{{ request('search') }}"
                                       placeholder="Cari produk rajutan..."
                                       class="w-full rounded-2xl border border-pink-200 bg-pink-50/50 pl-10 pr-3 py-3 text-sm text-gray-700 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                            </div>
                        </div>

                        <div class="col-span-full md:col-span-1">
                            <label for="category_id" class="sr-only">Kategori</label>
                            <select id="category_id" name="category_id"
                                    class="w-full rounded-2xl border border-pink-200 bg-pink-50/50 py-3 px-3 text-sm text-gray-700 focus:border-pink-400 focus:ring focus:ring-pink-200/60">
                                <option value="">Semua Kategori</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="md:col-span-1 flex items-center gap-3">
                            <button type="submit" class="inline-flex w-full justify-center rounded-2xl bg-pink-500 px-5 py-3 text-sm font-semibold text-white shadow-lg transition hover:bg-pink-600">
                                Terapkan
                            </button>
                            <a href="{{ route('products.index') }}" class="hidden md:inline-flex items-center justify-center rounded-2xl border border-pink-200 px-4 py-3 text-sm font-semibold text-pink-500 transition hover:border-pink-300">
                                Reset
                            </a>
                        </div>
                        <a href="{{ route('products.index') }}" class="md:hidden inline-flex items-center justify-center rounded-2xl border border-pink-200 px-4 py-3 text-sm font-semibold text-pink-500 transition hover:border-pink-300">
                            Reset
                        </a>
                    </form>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse($products as $product)
                    <x-product-card :product="$product" />
                @empty
                    <div class="col-span-full">
                        <div class="rounded-3xl border border-pink-100 bg-white/90 p-12 text-center shadow-lg">
                            <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-pink-50">
                                <svg class="h-8 w-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-4h-2m0 0V6a2 2 0 00-2-2H9a2 2 0 00-2 2v3m6 0V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v3" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Produk tidak ditemukan</h3>
                            <p class="text-gray-600 mb-4">Coba ubah pencarian atau pilih kategori lain.</p>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center rounded-full bg-pink-500 px-6 py-2 text-sm font-semibold text-white transition hover:bg-pink-600">
                                Reset Pencarian
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="mt-10 flex justify-center">
                <div class="rounded-full border border-pink-100 bg-white/80 px-5 py-3 shadow-lg backdrop-blur-sm">
                    {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
