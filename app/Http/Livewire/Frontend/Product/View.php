<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedStock;

    public function colorSelected($productColorId)
    {
        // dd($productColorId);
        $productColor = $this->product->productColor()->where('id', $productColorId)->first();
        $this->productColorSelectedStock = $productColor->stock;
        // dd($productColor->stock);
        if ($this->productColorSelectedStock == 0) {
            $this->productColorSelectedStock = 'outOfStock';
        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [

            'category' => $this->category,
            'product' => $this->product
        ]);
    }
}
