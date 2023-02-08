<?php

namespace App\Http\Livewire\Frontend\Checkout;

use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Frontend\Cart;
use App\Models\OrderItem;

class CheckoutShow extends Component
{
    public $carts, $cartList, $totalPriceAmount = 0;

    public $fullname, $email, $phone, $pincode, $address, $payment_mode = NULL, $payment_id = NULL;

    public function rules()
    {
        return [
            'fullname' => 'required|string|min:3|max:121',
            'email' => 'required|email|min:3|max:121',
            'phone' => 'required|string',
            'pincode' => 'required|string|min:3|max:6',
            'address' => 'required|string|max:500'
        ];
    }
    public function placeOrder()
    {
        $this->validate();
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'tracking_no' => 'bd-' . Str::random(5),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,
            'payment_id' => $this->payment_id
        ]);
        foreach ($this->carts as $cartItem) {
            // dd($cartItem);
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'product_color_id' => $cartItem->product_color_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->sellingPrice
            ]);
            if ($cartItem->product_color_id != NULL) {
                $cartItem->productColor()->where('id', $cartItem->product_color_id)->decrement('stock', $cartItem->quantity);
            }
        }
        return $order;
    }

    public function codOrder()
    {
        $this->payment_mode = 'Cash On Delivery';
        $codOrder = $this->placeOrder();
        if ($codOrder) {
            Cart::where('user_id', auth()->user()->id)->delete();
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order successfull',
                'type' => 'success',
                'status' => 200
            ]);
            return redirect()->to('thank-you');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something went wrong',
                'type' => 'error',
                'status' => 500
            ]);
            return false;
        }
    }

    public function totalProductAmount()
    {
        $this->totalPriceAmount = 0;
        $this->carts = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem) {
            $this->totalPriceAmount += $cartItem->product->sellingPrice * $cartItem->quantity;
        }
        return $this->totalPriceAmount;
    }
    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->totalPriceAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalPriceAmount' => $this->totalPriceAmount
        ]);
    }
}
