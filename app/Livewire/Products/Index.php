<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $sortField = 'product_name';
    public $sortDirection = 'asc';
    public $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
        'sortField' => ['except' => 'product_name'],
        'sortDirection' => ['except' => 'asc'],
        'perPage' => ['except' => 10],
    ];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }
        
        $this->sortField = $field;
    }

    public function deleteProduct($productId)
    {
        try {
            $product = Product::findOrFail($productId);
            $product->delete();
            
            session()->flash('success', 'Product deleted successfully.');
            $this->dispatch('product-deleted');
        } catch (\Exception $e) {
            session()->flash('error', 'Error deleting product: ' . $e->getMessage());
        }
    }

    #[On('product-created')]
    #[On('product-updated')]
    #[On('product-deleted')]
    public function render()
    {
        return view('livewire.products.index', [
            'products' => Product::query()
                ->when($this->search, function ($query) {
                    $query->where('product_name', 'like', '%' . $this->search . '%')
                          ->orWhere('sku', 'like', '%' . $this->search . '%')
                          ->orWhere('description', 'like', '%' . $this->search . '%');
                })
                ->orderBy($this->sortField, $this->sortDirection)
                ->paginate($this->perPage)
        ]);
    }
}
