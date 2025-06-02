<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use WireElements\Pro\Components\Modal\Modal;

class Form extends Modal
{
    public ?Product $product = null;

    #[Validate('required|string|max:255')]
    public $product_name = '';

    #[Validate(['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\-]+$/'])]
    public $sku = '';

    #[Validate('required|integer|min:0')]
    public $quantity = 0;

    #[Validate('required|numeric|min:0.01')]
    public $price = 0.00;

    #[Validate('nullable|string')]
    public $description = '';

    public function mount($productId = null)
    {
        if ($productId) {
            $this->product = Product::findOrFail($productId);
            $this->product_name = $this->product->product_name;
            $this->sku = $this->product->sku;
            $this->quantity = $this->product->quantity;
            $this->price = $this->product->price;
            $this->description = $this->product->description;
        }

        if (!$productId) {
            $this->sku = 'SKU-' . strtoupper(uniqid());
        }
    }

    public function save()
    {
        $this->validate();

        try {
            $data = [
                'product_name' => $this->product_name,
                'sku' => $this->sku,
                'quantity' => $this->quantity,
                'price' => $this->price,
                'description' => $this->description,
            ];

            if ($this->product) {
                // Additional validation for update
                $this->validate([
                    'sku' => [
                        Rule::unique('products')->ignore($this->product->id),
                    ],
                ]);
                
                $this->product->update($data);
                session()->flash('success', 'Product updated successfully.');
            } else {
                // Additional validation for create
                $this->validate([
                    'sku' => [
                        Rule::unique('products'),
                    ],
                ]);
                
                Product::create($data);
                session()->flash('success', 'Product created successfully.');
            }

            $this->dispatch('product-created');
            $this->dispatch('close-modal', 'product-form');
        } catch (\Exception $e) {
            session()->flash('error', 'Error saving product: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.products.form');
    }
}
