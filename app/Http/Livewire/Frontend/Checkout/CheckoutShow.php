<?php

namespace App\Http\Livewire\Frontend\Checkout;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Str;

class CheckoutShow extends Component
{
    public $carts, $totalProductAmount = 0;

    public $fullname, $email, $phone, $postcode, $address, $payment_mode = NULL, $payment_id = NULL;

    //check validation
    public function rules()
    {
        return [
            'fullname' => 'required|string|max:130',
            'email' => 'required|email|max:130',
            'phone' => 'required|string|max:11|min:10',
            'postcode' => 'required|string|max:5|min:5',
            'address' => 'required|string|max:500',
        ];
    }

    public function placeOrder()
    {
        $this->validate();
        $order = Order::create([
            'userId' => auth()->user()->id,
            'tracking_no' => 'funda-'.Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'postcode' => $this->postcode,
            'address' => $this->address,
            'status_message' => 'In Progress',
            'payment_mode' => $this->payment_mode,
            'paymentId' => $this->payment_id
        ]);

        foreach ($this->carts as $cartItem){
            $orderItems = OrderItem::create([
            'orderId' => $order->id,
            'productId' => $cartItem->productId,
            'quantity' => $cartItem->quantity,
            'price' =>$cartItem->product->productSellingPrice
            ]);

            if($cartItem->quantity != NULL)
            {
                $cartItem->product()->where('productId', $cartItem->productId)->decrement('productQuantity', $cartItem->quantity);
            }

        }

        return $order;
        
    }

    public function codOrder()
    {
        
        $this->payment_mode = 'Cash on Delivery';
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('userId', auth()->user()->id)->delete();

            session()->flash('message','Order Placed Successfully');
            $this->dispatchBrowserEvent('message', [
                'text' => 'Order Placed Successfully',
                'type' => 'success',
                'status' => 200
                ]);

            return redirect()->to('thankyou');
        }
        else{
            $this->dispatchBrowserEvent('message', [
                'text' => 'Something Went Wrong',
                'type' => 'error',
                'status' => 500
                ]);
        }

    }

    public function totalProductAmount()
    {
        $this->totalProductAmount = 0;
        $this->carts = Cart::where('userId', auth()->user()->id)->get();
        foreach ($this->carts as $cartItem){
            $this->totalProductAmount += $cartItem->product->productSellingPrice * $cartItem->quantity; 
        }
        return $this->totalProductAmount;
    }

    public function render()
    {
        $this->fullname = auth()->user()->name;
        $this->email = auth()->user()->email;

        $this->totalProductAmount = $this->totalProductAmount();
        return view('livewire.frontend.checkout.checkout-show', [
            'totalProductAmount' => $this->totalProductAmount
            
        ]);
    }
}
