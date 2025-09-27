<x-admin-layout title="Detail Produk">
    <x-slot name="header">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Detail Produk: {{ $product->name }}</h1>
            <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:gap-3">
                <a href="{{ route('admin.products.edit', $product) }}" class="inline-flex items-center justify-center rounded-md bg-yellow-500 px-4 py-2 text-sm font-medium text-white transition hover:bg-yellow-600">
                    Edit Produk
                </a>
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700">
                    Kembali ke Produk
                </a>
            </div>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2">
        <div class="bg-white rounded-lg shadow">
            <div class="p-6 space-y-4">
                <h2 class="text-lg font-semibold text-gray-900">Informasi Produk</h2>

                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Nama</span>
                    <span class="col-span-2 text-gray-900">{{ $product->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Kategori</span>
                    <span class="col-span-2 text-gray-900">{{ $product->category->name }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Harga</span>
                    <span class="col-span-2 text-gray-900 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Stok</span>
                    <span class="col-span-2 text-gray-900">{{ $product->stock }} unit</span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Status</span>
                    <span class="col-span-2">
                        <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $product->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Dibuat</span>
                    <span class="col-span-2 text-gray-900">{{ $product->created_at->format('M d, Y H:i') }}</span>
                </div>
                <div class="grid grid-cols-3 gap-4 text-sm">
                    <span class="font-medium text-gray-500">Terakhir diubah</span>
                    <span class="col-span-2 text-gray-900">{{ $product->updated_at->format('M d, Y H:i') }}</span>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-900">Aksi Cepat</h2>

                    <a href="{{ route('admin.products.edit', $product) }}" class="block rounded-md bg-yellow-500 px-4 py-2 text-center text-sm font-medium text-white transition hover:bg-yellow-600">
                        Edit Produk
                    </a>

                    @if($product->is_active)
                        <form method="POST" action="{{ route('admin.products.update', $product) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="stock" value="{{ $product->stock }}">
                            <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                            <input type="hidden" name="is_active" value="0">
                            <button type="submit" class="w-full rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                                Nonaktifkan Produk
                            </button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('admin.products.update', $product) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="stock" value="{{ $product->stock }}">
                            <input type="hidden" name="category_id" value="{{ $product->category_id }}">
                            <input type="hidden" name="is_active" value="1">
                            <button type="submit" class="w-full rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-green-700">
                                Aktifkan Produk
                            </button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('admin.products.destroy', $product) }}" onsubmit="return confirm('Yakin ingin menghapus produk ini? Tindakan tidak bisa dibatalkan.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="w-full rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                            Hapus Produk
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-900">Statistik Produk</h2>
                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between text-gray-600">
                            <span>Total Pesanan</span>
                            <span class="font-medium text-gray-900">0</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Total Terjual</span>
                            <span class="font-medium text-gray-900">0 unit</span>
                        </div>
                        <div class="flex justify-between text-gray-600">
                            <span>Pendapatan</span>
                            <span class="font-medium text-gray-900">Rp 0</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500">Statistik akan muncul otomatis setelah produk memiliki transaksi.</p>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
