<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class View extends Component
{
    public $category, $product, $quantityCount = 1;


    public function incrementQuantity()
    {
        if($this->quantityCount <10){
            $this->quantityCount++;
        }
        
    }

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    //Shopping Cart
    public function addToCart(int $productId)
    {   
        if(Auth::check())
        {
            if($this->product->where('productId',$productId)->exists())
            {

                if(Cart::where('userId', auth()->user()->id)->where('productId', $productId)->exists())
                {
                    $this->dispatchBrowserEvent('message', [
                        'text' => 'Product Already Added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
                else
                {

                    if($this->product->productQuantity > 0)
                        {
                            if($this->product->productQuantity > $this->quantityCount)
                            {
                                //Insert Product to Cart 
                                Cart::create([
                                    'userId' =>auth()->user()->id,
                                    'productId' =>$productId,
                                    'quantity' => $this->quantityCount

                                ]);

                                $this->emit('CartAdded');

                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Product Added to Cart',
                                    'type' => 'success',
                                    'status' => 200
                                ]);
                            }
                            else
                            {
                                $this->dispatchBrowserEvent('message', [
                                    'text' => 'Only '.$this->product->productQuantity.' Quantity Available',
                                    'type' => 'warning',
                                    'status' => 404
                                ]);
                            }
                        }
                    else
                        {
                            $this->dispatchBrowserEvent('message', [
                                'text' => 'Out of Stock',
                                'type' => 'info',
                                'status' => 404
                            ]);
                        }
                }
            }
            else
            {
                $this->dispatchBrowserEvent('message', [
                    'text' => 'Product Does not exists',
                    'type' => 'info',
                    'status' => 404
                ]);
            }
        }
        else
        {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please Login to add to cart',
                'type' => 'info',
                'status' => 401
            ]);

        }
    }

    public function mount($category, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'category' => $this->category,
            'product' => $this->product,
        ]);
    }

    
}
