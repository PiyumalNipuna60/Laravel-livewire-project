<div class="container"
    style="margin-left: auto; margin-right: auto; padding-left: 1rem; padding-right: 1rem; padding-top: 1.5rem; padding-bottom: 1.5rem;">
    <div
        style="background-color: white; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); overflow: hidden;">
        <div
            style="padding: 1.5rem; border-bottom-width: 1px; border-color: #e5e7eb; background-color: #f9fafb; display: flex; flex-direction: column; justify-content: space-between; align-items: flex-start; gap: 1rem;">
            <h2
                style="font-size: 1.5rem; line-height: 2rem; font-weight: 600; color: #1f2937; background-color:rgb(132, 162, 227); ">
                Product Inventory</h2>

            <div style="width: 100%; display: flex; flex-direction: column; gap: 0.75rem; align-items: flex-end;">
                <div style="position: relative; width: 100%;">
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search products..."
                        style="padding-left: 2.5rem; padding-right: 1rem; padding-top: 0.5rem; padding-bottom: 0.5rem; border-width: 1px; border-radius: 0.5rem; width: 95%;">
                </div>

                <button wire:click="$dispatch('open-modal', {component: 'product-form'})"
                    style="padding-left: 1rem; padding-right: 3rem; padding-top: 0.5rem; padding-bottom: 0.5rem; background-color: #2563eb; color: white; border-radius: 0.5rem; display: flex; align-items: center; gap: 0.5rem; width: 100%; justify-content: center;">
                    Add Product
                </button>
            </div>
        </div>

        @if (session()->has('success'))
        <div style="background-color: #f0fdf4; border-left-width: 4px; border-color: #22c55e; color: #166534; padding: 1rem;"
            role="alert">
            <p>{{ session('success') }}</p>
        </div>
        @endif

        @if (session()->has('error'))
        <div style="background-color: #fef2f2; border-left-width: 4px; border-color: #ef4444; color: #991b1b; padding: 1rem;"
            role="alert">
            <p>{{ session('error') }}</p>
        </div>
        @endif

        <div style="overflow-x: auto;">
            <table style="min-width: 100%; divide-y; divide-color: #e5e7eb;">
                <thead style="background-color: #f9fafb;">
                    <tr>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; cursor: pointer;"
                            wire:click="sortBy('product_name')">
                            <div style="display: flex; align-items: center; gap: 0.25rem;">
                                Product Name
                                @if($sortField === 'product_name')
                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1rem; width: 1rem;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @if($sortDirection === 'desc')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="height: 1rem; width: 1rem; transform: rotate(180deg);" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @endif
                                @endif
                            </div>
                        </th>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; cursor: pointer;"
                            wire:click="sortBy('sku')">
                            <div style="display: flex; align-items: center; gap: 0.25rem;">
                                SKU
                                @if($sortField === 'sku')
                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1rem; width: 1rem;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @if($sortDirection === 'desc')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="height: 1rem; width: 1rem; transform: rotate(180deg);" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @endif
                                @endif
                            </div>
                        </th>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; cursor: pointer;"
                            wire:click="sortBy('quantity')">
                            <div style="display: flex; align-items: center; gap: 0.25rem;">
                                Quantity
                                @if($sortField === 'quantity')
                                <svg xmlns="http://www.w3.org/2000/svg" style="height: 1rem; width: 1rem;" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @if($sortDirection === 'desc')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="height: 1rem; width: 1rem; transform: rotate(180deg);" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @endif
                                @endif
                            </div>
                        </th>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em; cursor: pointer;"
                            wire:click="sortBy('price')">
                            <div style="display: flex; align-items: center; gap: 0.25rem;">
                                Price
                                @if($sortField === 'price')
                                @if($sortDirection === 'desc')
                                <svg xmlns="http://www.w3.org/2000/svg"
                                    style="height: 1rem; width: 1rem; transform: rotate(180deg);" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 15l7-7 7 7" />
                                </svg>
                                @endif
                                @endif
                            </div>
                        </th>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em;">
                            Description
                        </th>
                        <th scope="col"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 0.75rem; padding-bottom: 0.75rem; text-align: right; font-size: 0.75rem; font-weight: 500; color: #6b7280; letter-spacing: 0.05em;">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody style="background-color: white; divide-y; divide-color: #e5e7eb;">
                    @forelse ($products as $product)
                    <tr style="transition: background-color 0.2s;">
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; white-space: nowrap; font-size: 0.875rem; font-weight: 500; color: #111827; border-bottom-width: 1px; border-color: #e5e7eb;">
                            {{ $product->product_name }}
                        </td>
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280; border-bottom-width: 1px; border-color: #e5e7eb;">
                            {{ $product->sku }}
                        </td>
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280; border-bottom-width: 1px; border-color: #e5e7eb;">
                            {{ $product->quantity }}
                        </td>
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280; border-bottom-width: 1px; border-color: #e5e7eb;">
                            ${{ number_format($product->price, 2) }}
                        </td>
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; font-size: 0.875rem; color: #6b7280; max-width: 20rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; border-bottom-width: 1px; border-color: #e5e7eb;">
                            {{ $product->description }}
                        </td>
                        <td
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; white-space: nowrap; text-align: right; font-size: 0.875rem; font-weight: 500; border-bottom-width: 1px; border-color: #e5e7eb;">
                            <div style="display: flex; justify-content: flex-end; gap: 0.5rem;">
                                <button
                                    wire:click="$dispatch('open-modal', {component: 'product-form', arguments: {productId: {{ $product->id }} }})"
                                    style="color: #2563eb;">
                                    Edit
                                </button>
                                <button wire:click="deleteProduct({{ $product->id }})"
                                    onclick="confirm('Are you sure you want to delete this product?') || event.stopImmediatePropagation()"
                                    style="color: #dc2626; margin-left: 0.5rem;">
                                    Delete
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6"
                            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; text-align: center; font-size: 0.875rem; color: #6b7280; border-bottom-width: 1px; border-color: #e5e7eb;">
                            No products found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div
            style="padding-left: 1.5rem; padding-right: 1.5rem; padding-top: 1rem; padding-bottom: 1rem; border-top-width: 1px; border-color: #e5e7eb; display: flex; flex-direction: column; align-items: center; justify-content: space-between; gap: 1rem;">
            <div style="font-size: 0.875rem; color: #6b7280;">
                Showing <span style="font-weight: 500;">{{ $products->firstItem() }}</span> to <span
                    style="font-weight: 500;">{{ $products->lastItem() }}</span> of <span
                    style="font-weight: 500;">{{ $products->total() }}</span> results
            </div>

            <div style="display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                <select wire:model.live="perPage"
                    style="border-width: 1px; border-radius: 0.5rem; padding-left: 0.75rem; padding-right: 0.75rem; padding-top: 0.25rem; padding-bottom: 0.25rem; font-size: 0.875rem;">
                    <option value="10">10 per page</option>
                    <option value="25">25 per page</option>
                    <option value="50">50 per page</option>
                    <option value="100">100 per page</option>
                </select>

                {{ $products->links() }}
            </div>
        </div>
    </div>

    <livewire:modal />
</div>