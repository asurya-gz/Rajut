<x-admin-layout title="Detail Pesanan">
    <x-slot name="header">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
            <h1 class="text-2xl font-bold text-gray-900">Detail Pesanan #{{ $order->id }}</h1>
            <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center justify-center rounded-md bg-gray-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-gray-700">
                Kembali ke Daftar Pesanan
            </a>
        </div>
    </x-slot>

    <div class="grid grid-cols-1 gap-6 lg:grid-cols-3">
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Produk dalam Pesanan</h2>

                    <div class="space-y-4">
                        @foreach($order->items as $item)
                            <div class="flex flex-col gap-4 border-b border-gray-200 pb-4 last:border-b-0 last:pb-0 sm:flex-row sm:items-center sm:justify-between">
                                <div>
                                    <h3 class="font-medium text-gray-900">{{ $item->product->name }}</h3>
                                    <p class="text-sm text-gray-500">{{ $item->product->category->name }}</p>
                                    <p class="text-sm text-gray-600">Rp {{ number_format($item->price, 0, ',', '.') }} × {{ $item->qty }}</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-900">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6 border-t border-gray-200 pt-6">
                        <div class="flex items-center justify-between">
                            <p class="text-lg font-semibold text-gray-900">Total</p>
                            <p class="text-xl font-bold text-pink-600">Rp {{ number_format($order->total, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6">
                    <h2 class="text-lg font-semibold text-gray-900 mb-4">Catatan Pelanggan</h2>
                    <p class="text-sm text-gray-600">{{ $order->notes ?? 'Tidak ada catatan tambahan.' }}</p>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-4">
                    <h2 class="text-lg font-semibold text-gray-900">Status Pesanan</h2>

                    <div class="flex items-center justify-between">
                        <span class="text-sm text-gray-600">Status Saat Ini</span>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                            @if($order->status === 'pending') bg-yellow-100 text-yellow-800
                            @elseif($order->status === 'processing') bg-blue-100 text-blue-800
                            @elseif($order->status === 'shipped') bg-purple-100 text-purple-800
                            @elseif($order->status === 'completed') bg-green-100 text-green-800
                            @else bg-red-100 text-red-800 @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </div>

                    <form method="POST" action="{{ route('admin.orders.update-status', $order) }}" class="space-y-4">
                        @csrf
                        @method('PATCH')

                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Perbarui Status</label>
                            <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processing" {{ $order->status === 'processing' ? 'selected' : '' }}>Processing</option>
                                <option value="shipped" {{ $order->status === 'shipped' ? 'selected' : '' }}>Shipped</option>
                                <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $order->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <button type="submit" class="w-full inline-flex items-center justify-center rounded-md bg-pink-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-pink-700">
                            Simpan Status
                        </button>
                    </form>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-900">Informasi Pelanggan</h2>

                    <div class="space-y-2">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Nama</span>
                            <span class="font-medium text-gray-900">{{ $order->user->name }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Email</span>
                            <span class="font-medium text-gray-900">{{ $order->user->email }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Telepon</span>
                            <span class="font-medium text-gray-900">{{ $order->address->phone ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-900">Alamat Pengiriman</h2>
                    <p class="text-sm text-gray-600 leading-relaxed">{{ $order->address_text }}</p>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-3">
                    <h2 class="text-lg font-semibold text-gray-900">Detail Pesanan</h2>

                    <div class="space-y-2 text-sm">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Order ID</span>
                            <span class="font-medium text-gray-900">#{{ $order->id }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tanggal Pesanan</span>
                            <span class="font-medium text-gray-900">{{ $order->created_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Terakhir Diperbarui</span>
                            <span class="font-medium text-gray-900">{{ $order->updated_at->format('M d, Y H:i') }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Jumlah Produk</span>
                            <span class="font-medium text-gray-900">{{ $order->items->count() }} item</span>
                        </div>
                        <div class="flex justify-between border-t border-gray-200 pt-2">
                            <span class="text-sm font-semibold text-gray-600">Total Pembayaran</span>
                            <span class="text-lg font-bold text-pink-600">Rp {{ number_format($order->total, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-6 space-y-2">
                    <h2 class="text-lg font-semibold text-gray-900">Aksi Cepat</h2>

                    @if($order->status === 'pending')
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="processing">
                            <button type="submit" class="w-full rounded-md bg-blue-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-blue-700">
                                Tandai sebagai Processing
                            </button>
                        </form>
                    @endif

                    @if($order->status === 'processing')
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="shipped">
                            <button type="submit" class="w-full rounded-md bg-purple-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-purple-700">
                                Tandai sebagai Shipped
                            </button>
                        </form>
                    @endif

                    @if($order->status !== 'completed')
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="completed">
                            <button type="submit" class="w-full rounded-md bg-green-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-green-700">
                                Tandai sebagai Selesai
                            </button>
                        </form>
                    @endif

                    @if($order->status !== 'cancelled')
                        <form method="POST" action="{{ route('admin.orders.update-status', $order) }}">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="cancelled">
                            <button type="submit" class="w-full rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white transition hover:bg-red-700">
                                Batalkan Pesanan
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
