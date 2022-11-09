<?php

namespace App\Http\Livewire\Frontend\Cart;

use Livewire\Component;
use App\Models\Cart;

class CartShow extends Component
{
    public $cart, $totalPrice =0;

    
    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('userId',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->product->productQuantity > $cartData->quantity)
            {
                $cartData->increment('quantity');
                $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                'text' => 'Only '.$cartData->product->productQuantity. ' Quantity Available',
                'type' => 'error',
                'status' => 404
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('userId',auth()->user()->id)->first();
        if($cartData)
        {
            if($cartData->quantity > 1)
            {
                $cartData->decrement('quantity');
                $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity Updated',
                'type' => 'success',
                'status' => 200
                ]);
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                'text' => 'Quantity cannot be less than 1',
                'type' => 'error',
                'status' => 404
                ]);
            }
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function deleteCartItem(int $cartId)
    {
        $cartDeleteData = Cart::where('userId', auth()->user()->id)->where('id', $cartId)->first();
        if($cartDeleteData){
            $cartDeleteData->delete();

            $this->emit('CartAdded');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Cart Item Deleted Successfully',
                'type' => 'success',
                'status' => 200
             ]);
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }

    }

    public function render()
    {
        $this->cart = Cart::where('userId', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show',[
            'cart' => $this->cart
        ]);
    }
}
