<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Form extends Component
{
    public ?Product $product = null;
    
    #[Rule('required|string|max:255')]
    public $product_name = '';
    
    #[Rule(['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9\-]+$/'])]
    public $sku = '';
    
    #[Rule('required|integer|min:0')]
    public $quantity = 0;
    
    #[Rule('required|numeric|min:0.01')]
    public $price = 0.00;
    
    #[Rule('nullable|string')]
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
                $this->product->update($data);
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'Product "' . $this->product_name . '" has been updated successfully.'
                ]);
            } else {
                Product::create($data);
                $this->dispatch('notify', [
                    'type' => 'success',
                    'message' => 'Product "' . $this->product_name . '" has been saved successfully.'
                ]);
            }

            return redirect()->route('products.index');
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Error ' . ($this->product ? 'updating' : 'saving') . ' product: ' . $e->getMessage()
            ]);
        }
    }

    public function render()
    {
        return view('livewire.products.form')
            ->layout('layouts.app');
    }
}
