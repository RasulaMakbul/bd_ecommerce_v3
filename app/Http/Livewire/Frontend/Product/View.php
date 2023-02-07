<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Frontend\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedStock;

    public function colorSelected($productColorId)
    {
        $productColor = $this->product->productColor()->where('id', $productColorId)->first();
        $this->productColorSelectedStock = $productColor->stock;

        if ($this->productColorSelectedStock == 0) {
            $this->productColorSelectedStock = 'outOfStock';
        }
    }
    public function addToWishList($productID)
    {
        if (Auth::check()) {
            if (Wishlist::where('user_id', auth()->user()->id)->where('product_id', $productID)->exists()) {

                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to wishlist',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                $wishlist = Wishlist::create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $productID,
                ]);
                $this->emit('wishlistUpdated');
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Added to wishlist',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login First',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
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
