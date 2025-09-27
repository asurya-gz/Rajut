<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Product Details') }}: {{ $product->name }}
            </h2>
            <div class="space-x-3">
                <a href="{{ route('admin.products.edit', $product) }}" 
                   class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-md font-medium">
                    Edit Product
                </a>
                <a href="{{ route('admin.products.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-md font-medium">
                    Back to Products
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Product Information -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Information</h3>
                        
                        <div class="space-y-4">
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Name:</div>
                                <div class="col-span-2 text-sm text-gray-900">{{ $product->name }}</div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Category:</div>
                                <div class="col-span-2 text-sm text-gray-900">{{ $product->category->name }}</div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Price:</div>
                                <div class="col-span-2 text-sm text-gray-900 font-bold">
                                    Rp {{ number_format($product->price, 0, ',', '.') }}
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Stock:</div>
                                <div class="col-span-2 text-sm text-gray-900">{{ $product->stock }} units</div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Status:</div>
                                <div class="col-span-2">
                                    <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full 
                                               {{ $product->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $product->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Created:</div>
                                <div class="col-span-2 text-sm text-gray-900">
                                    {{ $product->created_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-3 gap-4">
                                <div class="text-sm font-medium text-gray-500">Last Updated:</div>
                                <div class="col-span-2 text-sm text-gray-900">
                                    {{ $product->updated_at->format('M d, Y H:i') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Actions -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                            
                            <div class="space-y-3">
                                <a href="{{ route('admin.products.edit', $product) }}" 
                                   class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-2 px-4 rounded-md font-medium text-center block">
                                    Edit Product
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
                                        <button type="submit" 
                                                class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md font-medium">
                                            Deactivate Product
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
                                        <button type="submit" 
                                                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md font-medium">
                                            Activate Product
                                        </button>
                                    </form>
                                @endif
                                
                                <form method="POST" action="{{ route('admin.products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="w-full bg-red-600 hover:bg-red-700 text-white py-2 px-4 rounded-md font-medium"
                                            onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone.')">
                                        Delete Product
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Product Statistics (placeholder for future enhancements) -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">Product Statistics</h3>
                            
                            <div class="space-y-3">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Total Orders:</span>
                                    <span class="text-sm font-medium text-gray-900">0</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Total Sold:</span>
                                    <span class="text-sm font-medium text-gray-900">0 units</span>
                                </div>
                                
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">Revenue:</span>
                                    <span class="text-sm font-medium text-gray-900">Rp 0</span>
                                </div>
                            </div>
                            
                            <p class="text-xs text-gray-500 mt-4">
                                Statistics will be available once orders are placed for this product.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>