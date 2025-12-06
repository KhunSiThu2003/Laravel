@extends('app')

@section('title', 'Create Product')
@section('page-title', 'Create New Product')
@section('page-subtitle', 'Add a new product to your inventory')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

            <!-- Card Header -->
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Product Information</h3>
                <p class="text-sm text-gray-500">Fill in the required information</p>
            </div>

            <!-- Form -->
            <form action="{{ route('product.store') }}" method="POST" class="p-6 space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-6">
                        <!-- Product Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Product Name
                                *</label>
                            <input type="text" id="name" name="name"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                placeholder="e.g., iPhone 15 Pro Max">
                            <p class="mt-1 text-xs text-gray-500">Enter a descriptive name for the product</p>
                        </div>

                        <!-- Category -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-2">Category *</label>
                            <select id="category_id" name="category_id"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <p class="mt-1 text-xs text-gray-500">Select the product category</p>
                        </div>

                        <!-- Price -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="price" class="block text-sm font-medium text-gray-700 mb-2">Price *</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input type="number" id="price" name="price" step="0.01" min="0"
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="0.00">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Current selling price</p>
                            </div>

                            <div>
                                <label for="compare_price" class="block text-sm font-medium text-gray-700 mb-2">Compare
                                    Price</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <span class="text-gray-500">$</span>
                                    </div>
                                    <input type="number" id="compare_price" name="compare_price" step="0.01"
                                        min="0"
                                        class="w-full pl-8 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="0.00">
                                </div>
                                <p class="mt-1 text-xs text-gray-500">Original price for comparison</p>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 mb-2">Stock Quantity
                                *</label>
                            <input type="number" id="stock" name="stock" min="0"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                placeholder="e.g., 100">
                            <p class="mt-1 text-xs text-gray-500">Available quantity in inventory</p>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-6">
                        <!-- SKU -->
                        <div>
                            <label for="sku" class="block text-sm font-medium text-gray-700 mb-2">SKU (Stock Keeping
                                Unit)</label>
                            <input type="text" id="sku" name="sku"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                placeholder="e.g., PROD-001-2024">
                            <p class="mt-1 text-xs text-gray-500">Unique identifier for inventory tracking</p>
                        </div>

                        <!-- Weight -->
                        <div>
                            <label for="weight" class="block text-sm font-medium text-gray-700 mb-2">Weight (kg)</label>
                            <div class="relative">
                                <input type="number" id="weight" name="weight" step="0.01" min="0"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                    placeholder="0.00">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">kg</span>
                                </div>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Product weight for shipping calculation</p>
                        </div>

                        <!-- Dimensions -->
                        <div class="grid grid-cols-3 gap-4">
                            <div>
                                <label for="length" class="block text-sm font-medium text-gray-700 mb-2">Length</label>
                                <div class="relative">
                                    <input type="number" id="length" name="length" step="0.1" min="0"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="0.0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-xs text-gray-500">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="width" class="block text-sm font-medium text-gray-700 mb-2">Width</label>
                                <div class="relative">
                                    <input type="number" id="width" name="width" step="0.1" min="0"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="0.0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-xs text-gray-500">cm</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label for="height" class="block text-sm font-medium text-gray-700 mb-2">Height</label>
                                <div class="relative">
                                    <input type="number" id="height" name="height" step="0.1" min="0"
                                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                                        placeholder="0.0">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <span class="text-xs text-gray-500">cm</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-4">Status</label>
                            <div class="space-y-2">
                                <div class="flex items-center">
                                    <input type="radio" id="status_active" name="status" value="active"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300" checked>
                                    <label for="status_active" class="ml-3 text-sm text-gray-700">
                                        <span class="font-medium">Active</span>
                                        <p class="text-gray-500">Product is visible on the store</p>
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="status_draft" name="status" value="draft"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <label for="status_draft" class="ml-3 text-sm text-gray-700">
                                        <span class="font-medium">Draft</span>
                                        <p class="text-gray-500">Product is hidden from the store</p>
                                    </label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="status_inactive" name="status" value="inactive"
                                        class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300">
                                    <label for="status_inactive" class="ml-3 text-sm text-gray-700">
                                        <span class="font-medium">Inactive</span>
                                        <p class="text-gray-500">Product is permanently hidden</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea id="description" name="description" rows="4"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition"
                        placeholder="Describe the product features, specifications, and benefits..."></textarea>
                    <p class="mt-1 text-xs text-gray-500">Provide detailed information about the product</p>
                </div>

                <!-- Form Actions -->
                <div class="border-t border-gray-200 pt-6 flex justify-end space-x-3">
                    <a href="{{ route('product.index') }}"
                        class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 transition">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4">
                            </path>
                        </svg>
                        <span>Create Product</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
