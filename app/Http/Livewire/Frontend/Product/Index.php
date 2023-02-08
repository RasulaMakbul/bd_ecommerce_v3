<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Admin\Product;
use Livewire\Component;

class Index extends Component
{
    public $products, $category;
    public function mount($category)
    {
        // $this->products = $products;
        $this->category = $category;
    }
    public function render()
    {
        $this->products = Product::where('category_id', $this->category->id)->where('status', '1')->get();
        return view('livewire.frontend.product.index', [

            'Products' => $this->products,
            'category' => $this->category,
        ]);
    }
}
