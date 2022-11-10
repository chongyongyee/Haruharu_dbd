<?php

namespace App\Http\Livewire\Frontend\Product;

use Livewire\Component;
use App\Models\Product;

class Index extends Component
{
    public $products, $category, $priceInput;

    protected $queryString = [
        'priceInput' => ['except' => '', 'as' => 'price']
    ];

    public function mount($category)
    {
        
        $this->category= $category;

    }
    public function render()
    {
        
        $this->products = Product::where('categoryId', $this->category->categoryId)
                                    ->when($this->priceInput, function($q){
                                        $q->when($this->priceInput == 'highToLow', function($q2){
                                            $q2->orderBy('productSellingPrice','DESC');
                                            })
                                            ->when($this->priceInput == 'lowToHigh', function($q2){
                                                    $q2->orderBy('productSellingPrice','ASC');
                                            });

                                    })
                                    ->get();
                                    

        return view('livewire.frontend.product.index',[
            'products' => $this->products,
            'category' => $this->category,
        
        ]);
    }


}
