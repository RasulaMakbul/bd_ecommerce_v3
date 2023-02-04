<?php

namespace App\Http\Livewire\Admin\Brand;

use App\Models\Admin\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(1);
        return view('livewire.admin.brand.index', ['brands' => $brands]);
    }
}
