<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;

class View extends Component
{
    public $product, $category;
    public function mount($product, $category)
    {
        $this->product = $product;
        $this->category = $category;
    }
    public function render()
    {
        return view('livewire.frontend.product.view', [

            'product' => $this->product,
            'category' => $this->category,
        ]);
    }
}
