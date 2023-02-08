<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Frontend\Cart;
use App\Models\Frontend\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $category, $product, $productColorSelectedStock, $stockCount = 1, $productColorId;

    public function colorSelected($productColorId)
    {
        $this->productColorId = $productColorId;
        $productColor = $this->product->productColor()->where('id', $productColorId)->first();
        $this->productColorSelectedStock = $productColor->stock;

        if ($this->productColorSelectedStock == 0) {
            $this->productColorSelectedStock = 'outOfStock';
        }
    }

    public function decrementStock()
    {
        if ($this->stockCount > 1) {
            $this->stockCount--;
        }
    }

    public function incrementStock()
    {
        if ($this->stockCount < 10) {
            $this->stockCount++;
        }
    }
    public function addToCart(int $productId)
    {
        if (Auth::check()) {
            $quantity = $this->stockCount;
            if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->where('product_color_id', $this->productColorId)->exists()) {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Already added to Cart',
                    'type' => 'warning',
                    'status' => 409
                ]);
                return false;
            } else {
                if ($this->product->where('id', $productId)->where('status', '1')->exists()) {

                    if ($this->productColorSelectedStock != null) {
                        $productColor = $this->product->productColor()->where('id', $this->productColorId)->first();
                        if ($productColor->stock > 0) {
                            if ($productColor->stock > $quantity) {
                                Cart::create(
                                    [
                                        'user_id' => auth()->user()->id,
                                        'product_id' => $productId,
                                        'product_color_id' => $this->productColorId,
                                        'quantity' => $quantity
                                    ]
                                );
                                $this->emit('CartAddOrUpdate');
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Added to Cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            } else {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Not Enough Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                                return false;
                            }
                        } else {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out Of Stock',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                            return false;
                        }
                    } else {
                        $this->dispatchBrowserEvent('message', [
                            'text' => 'Select Color first',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                        return false;
                    }
                } else {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Does not Exist',
                        'type' => 'warning',
                        'status' => 404
                    ]);
                    return false;
                }
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
