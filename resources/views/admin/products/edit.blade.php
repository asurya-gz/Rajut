<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Product') }}: {{ $product->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('admin.products.update', $product) }}" class="space-y-6">
                        @csrf
                        @method('PATCH')
                        
                        <!-- Product Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700">Product Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700">Category *</label>
                            <select name="category_id" id="category_id" required
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" 
                                            {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Price -->
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700">Price (Rp) *</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" 
                                   min="0" step="1000" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700">Stock Quantity *</label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" 
                                   min="0" required
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @error('stock')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Active Status -->
                        <div>
                            <div class="flex items-center">
                                <input type="checkbox" name="is_active" id="is_active" value="1" 
                                       {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                                       class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                    Active (visible to customers)
                                </label>
                            </div>
                            @error('is_active')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-between pt-6">
                            <a href="{{ route('admin.products.index') }}" 
                               class="bg-gray-600 hover:bg-gray-700 text-white py-2 px-4 rounded-md font-medium">
                                Cancel
                            </a>
                            
                            <div class="space-x-3">
                                <a href="{{ route('admin.products.show', $product) }}" 
                                   class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-md font-medium">
                                    View Product
                                </a>
                                
                                <button type="submit" 
                                        class="bg-indigo-600 hover:bg-indigo-700 text-white py-2 px-4 rounded-md font-medium">
                                    Update Product
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>