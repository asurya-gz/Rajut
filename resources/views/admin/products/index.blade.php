<x-admin-layout title="Kelola Produk">
    <x-slot name="header">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Kelola Produk</h1>
                <p class="text-sm text-gray-500">Pantau katalog LoopE dan lakukan pembaruan secara cepat dan nyaman.</p>
            </div>
            <a href="{{ route('admin.products.create') }}" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-pink-200/60 transition hover:shadow-xl hover:-translate-y-0.5">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Produk Baru
            </a>
        </div>
    </x-slot>

    <div class="space-y-6">
        <div class="rounded-3xl border border-pink-100 bg-white/80 shadow-xl shadow-pink-100/50 backdrop-blur">
            <div class="p-6">
                @if($products->count() > 0)
                    <div class="overflow-x-auto -mx-6">
                        <div class="inline-block min-w-full align-middle px-6">
                            <table class="min-w-full divide-y divide-pink-100">
                                <thead class="bg-gradient-to-r from-pink-50 to-rose-50">
                                    <tr>
                                        <th class="py-3 text-left text-xs font-semibold uppercase tracking-wider text-pink-500">Produk</th>
                                        <th class="py-3 text-left text-xs font-semibold uppercase tracking-wider text-pink-500">Kategori</th>
                                        <th class="py-3 text-left text-xs font-semibold uppercase tracking-wider text-pink-500">Harga</th>
                                        <th class="py-3 text-left text-xs font-semibold uppercase tracking-wider text-pink-500">Stok</th>
                                        <th class="py-3 text-left text-xs font-semibold uppercase tracking-wider text-pink-500">Status</th>
                                        <th class="py-3 text-right text-xs font-semibold uppercase tracking-wider text-pink-500">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-pink-50 bg-white/70">
                                    @foreach($products as $product)
                                        <tr class="transition hover:bg-pink-50/70">
                                            <td class="py-4 text-sm font-semibold text-gray-900">
                                                <div class="flex flex-col">
                                                    <span>{{ $product->name }}</span>
                                                    <span class="text-xs text-gray-400">ID #{{ $product->id }}</span>
                                                </div>
                                            </td>
                                            <td class="py-4 text-sm text-gray-600">{{ $product->category->name }}</td>
                                            <td class="py-4 text-sm font-semibold text-gray-900">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                            <td class="py-4 text-sm font-medium text-gray-900">{{ $product->stock }}</td>
                                            <td class="py-4">
                                                <span class="inline-flex items-center gap-2 rounded-full px-3 py-1 text-xs font-semibold {{ $product->is_active ? 'bg-emerald-50 text-emerald-600 ring-1 ring-emerald-200' : 'bg-rose-50 text-rose-600 ring-1 ring-rose-200' }}">
                                                    <span class="h-2 w-2 rounded-full {{ $product->is_active ? 'bg-emerald-500' : 'bg-rose-500' }}"></span>
                                                    {{ $product->is_active ? 'Active' : 'Inactive' }}
                                                </span>
                                            </td>
                                            <td class="py-4 text-right text-sm font-medium">
                                                <div class="flex items-center justify-end gap-2">
                                                    <a href="{{ route('admin.products.show', $product) }}" class="inline-flex items-center gap-1 rounded-full border border-pink-100 px-3 py-1.5 text-xs font-semibold text-pink-500 transition hover:border-pink-300 hover:text-pink-600">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                        </svg>
                                                        Lihat
                                                    </a>
                                                    <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-3 py-1.5 text-xs font-semibold text-amber-700 transition hover:bg-amber-200">
                                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" class="inline" onsubmit="return confirm('Hapus produk ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="inline-flex items-center gap-1 rounded-full bg-rose-100 px-3 py-1.5 text-xs font-semibold text-rose-600 transition hover:bg-rose-200">
                                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                            </svg>
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center">
                        <div class="rounded-full border border-pink-100 bg-white/80 px-5 py-3 shadow-lg shadow-pink-100/50 backdrop-blur-sm">
                            {{ $products->onEachSide(1)->links('vendor.pagination.custom') }}
                        </div>
                    </div>
                @else
                    <div class="py-12 text-center">
                        <div class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-pink-50">
                            <svg class="h-8 w-8 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2M4 13h2m13-4h-2m0 0V6a2 2 0 00-2-2H9a2 2 0 00-2 2v3m6 0V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v3" />
                            </svg>
                        </div>
                        <p class="text-gray-500">Belum ada produk yang tercatat.</p>
                        <a href="{{ route('admin.products.create') }}" class="mt-6 inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-pink-500 to-rose-500 px-5 py-2.5 text-sm font-semibold text-white shadow-lg transition hover:shadow-xl hover:-translate-y-0.5">
                            Tambah Produk Pertama
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-admin-layout>
