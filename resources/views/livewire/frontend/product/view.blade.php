
<div>
<div class="py-3 py-md-5">
        <div class="container">
            @if(session()->has('message'))
                <div class="alert alert-success">   
                    {{ session('message') }}
                </div>
            @endif

            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                        <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                        No Image Added
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->productName}}
                            
                            @if($product->productQuantity >0 )
                                <label class="label-stock bg-success">In Stock</label>
                            @else
                                <label class="label-stock bg-danger">Out of Stock</label>
                            @endif

                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->category}} / {{ $product->productName}}
                        </p>
                        <div>
                            <span class="selling-price">RM {{ $product->productSellingPrice}}</span>
                        </div>

                        
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" readonly class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button"  wire:click="addToCart({{$product->productId}})" class="btn btn1"> 
                                <i class="fa fa-shopping-cart"></i> Add To Cart
                            </button>
                        </div>

                        <div class="mt-3">
                            <h5 class="mb-0">Description</h5>
                            <p>
                            {{!! $product->productDescription !!}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
