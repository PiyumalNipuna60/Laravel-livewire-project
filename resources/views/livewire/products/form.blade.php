<div>
    <x-modal name="product-form" maxWidth="2xl">
        <div style="padding: 1.5rem;">
            <h2 style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; color: #1f2937; margin-bottom: 1.5rem;">
                {{ $product ? 'Edit Product' : 'Create New Product' }}
            </h2>
            
            <form wire:submit.prevent="save" style="display: flex; flex-direction: column; gap: 1.5rem;">
                <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem;">
                    <div>
                        <label for="product_name" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Product Name</label>
                        <input
                            type="text"
                            id="product_name"
                            wire:model="product_name"
                            style="width: 100%; border-radius: 0.5rem; border: 1px solid #d1d5db; padding: 0.5rem;"
                            placeholder="Enter product name"
                        >
                        @error('product_name') <span style="font-size: 0.875rem; color: #dc2626;">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label for="sku" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">SKU</label>
                        <input
                            type="text"
                            id="sku"
                            wire:model="sku"
                            style="width: 100%; border-radius: 0.5rem; border: 1px solid #d1d5db; padding: 0.5rem;"
                            placeholder="Enter SKU"
                            {{ $product ? 'readonly' : '' }}
                        >
                        @error('sku') <span style="font-size: 0.875rem; color: #dc2626;">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label for="quantity" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Quantity</label>
                        <input
                            type="number"
                            id="quantity"
                            wire:model="quantity"
                            min="0"
                            style="width: 100%; border-radius: 0.5rem; border: 1px solid #d1d5db; padding: 0.5rem;"
                            placeholder="Enter quantity"
                        >
                        @error('quantity') <span style="font-size: 0.875rem; color: #dc2626;">{{ $message }}</span> @enderror
                    </div>
                    
                    <div>
                        <label for="price" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Price</label>
                        <div style="position: relative;">
                            <div style="position: absolute; top: 0; bottom: 0; left: 0; display: flex; align-items: center; padding-left: 0.75rem; pointer-events: none;">
                                <span style="color: #6b7280;">$</span>
                            </div>
                            <input
                                type="number"
                                id="price"
                                wire:model="price"
                                min="0.01"
                                step="0.01"
                                style="width: 100%; padding-left: 2rem; border-radius: 0.5rem; border: 1px solid #d1d5db; padding: 0.5rem;"
                                placeholder="0.00"
                            >
                        </div>
                        @error('price') <span style="font-size: 0.875rem; color: #dc2626;">{{ $message }}</span> @enderror
                    </div>
                </div>
                
                <div>
                    <label for="description" style="display: block; font-size: 0.875rem; font-weight: 500; color: #374151; margin-bottom: 0.25rem;">Description</label>
                    <textarea
                        id="description"
                        wire:model="description"
                        rows="3"
                        style="width: 100%; border-radius: 0.5rem; border: 1px solid #d1d5db; padding: 0.5rem;"
                        placeholder="Enter product description"
                    ></textarea>
                    @error('description') <span style="font-size: 0.875rem; color: #dc2626;">{{ $message }}</span> @enderror
                </div>
                
                <div style="display: flex; justify-content: flex-end; gap: 0.75rem; padding-top: 1rem;">
                    <button
                        type="button"
                        wire:click="$dispatch('close-modal', 'product-form')"
                        style="padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; color: #374151; background-color: #e5e7eb; border-radius: 0.5rem;"
                    >
                        Cancel
                    </button>
                    <button
                        type="submit"
                        style="padding: 0.5rem 1rem; font-size: 0.875rem; font-weight: 500; color: white; background-color: #2563eb; border-radius: 0.5rem;"
                    >
                        {{ $product ? 'Update Product' : 'Create Product' }}
                    </button>
                </div>
            </form>
        </div>
    </x-modal>
</div>