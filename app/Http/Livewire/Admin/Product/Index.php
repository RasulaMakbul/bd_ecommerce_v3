<?php

namespace App\Http\Livewire\Admin\Product;

use App\Models\Admin\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(1);
        return view('livewire.admin.product.index', ['products' => $products]);
    }
}
