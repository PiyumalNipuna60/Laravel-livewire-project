<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md overflow-hidden">
        <div class="p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">
                {{ $product ? 'Edit Product' : 'Create New Product' }}
            </h2>

            <form wire:submit="save" class="space-y-6">
                <div class="grid grid-cols-1 gap-6">
                    <div>
                        <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                        <input
                            type="text"
                            id="product_name"
                            wire:model="product_name"
                            class="mt-1 block w-full rounded-md border-red-500 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter product name"
                            style="border: 1px solid {{ $errors->has('product_name') ? 'red' : '#ebedf0' }};"
                        >
                        @error('product_name') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="sku" class="block text-sm font-medium text-gray-700">SKU</label>
                        <input
                            type="text"
                            id="sku"
                            wire:model="sku"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter SKU"
                            style="border: 1px solid {{ $errors->has('product_name') ? 'red' : '#ebedf0' }};"
                            {{ $product ? 'readonly' : '' }}
                        >
                        @error('sku') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                        <input
                            type="number"
                            id="quantity"
                            wire:model="quantity"
                            min="0"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter quantity"
                            style="border: 1px solid {{ $errors->has('product_name') ? 'red' : '#ebedf0' }};"
                        >
                        @error('quantity') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <div class="relative mt-1 rounded-md shadow-sm">
                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                <span class="text-gray-500 sm:text-sm">$</span>
                            </div>
                            <input
                                type="number"
                                id="price"
                                wire:model="price"
                                min="0.01"
                                step="0.01"
                                class="block w-full rounded-md border-gray-300 pl-7 focus:border-blue-500 focus:ring-blue-500"
                                placeholder="0.00"
                                style="border: 1px solid {{ $errors->has('product_name') ? 'red' : '#ebedf0' }};"
                            >
                        </div>
                        @error('price') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea
                            id="description"
                            wire:model="description"
                            rows="3"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            placeholder="Enter product description"
                            style="border: 1px solid {{ $errors->has('product_name') ? 'red' : '#ebedf0' }};"
                        ></textarea>
                        @error('description') 
                            <span class="text-sm text-red-600">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-3 pt-4">
                    <a href="{{ route('products.index') }}" 
                        class="inline-flex justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Cancel
                    </a>
                    <button type="submit" 
                        class="inline-flex justify-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        {{ $product ? 'Update Product' : 'Create Product' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>