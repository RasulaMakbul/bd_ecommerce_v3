<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Frontend\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistShow extends Component
{
    public function removeWishlistItem(int $wishlistId)
    {
        if (Auth::check()) {
            Wishlist::where('user_id', auth()->user()->id)->where('id', $wishlistId)->delete();
            $this->emit('wishlistUpdated');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login First',
                'type' => 'info',
                'status' => 401
            ]);
            return false;
        }
    }
    public function render()
    {
        $wishlist = Wishlist::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.wishlist-show', [
            'wishlist' => $wishlist
        ]);
    }
}
