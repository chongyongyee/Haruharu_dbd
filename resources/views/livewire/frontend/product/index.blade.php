<div>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                    <h4>Price</h4>
                </div>
                <div class="card-body">
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="highToLow"/> High to Low
                    </label>
                    <label class="d-block">
                        <input type="radio" name="priceSort" wire:model="priceInput" value="lowToHigh"/> Low to High
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="row">
                @forelse ($products as $productItem)
                    <div class="col-md-4">
                        <div class="product-card">
                            <div class="product-card-img">
                                @if($productItem->productQuantity >0 )
                                    <label class="stock bg-success">In Stock</label>
                                @else
                                    <label class="stock bg-danger">Out of Stock</label>
                                @endif

                                @if($productItem->productImages->count()> 0)
                                    <a href="{{ url('/collections/'.$productItem->category->categoryId.'/'.$productItem->productId) }}">
                                        <!-- get the first image of the product -->
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->productName}}">
                                    </a>
                                @endif

                            </div>

                            <div class="product-card-body">
                                <h5 class="product-name">
                                    <a href="{{ url('/collections/'.$productItem->category->categoryId.'/'.$productItem->productId) }}">
                                            {{$productItem->productName}} 
                                    </a>
                                </h5>

                                <div>
                                    <span class="selling-price">RM{{$productItem->productSellingPrice}} </span>
                                        <!-- <span class="original-price">{{$productItem->productOriginalPrice}}</span> -->
                                </div>

                                <div class="mt-2">
                                    <a href="{{ url('/collections/'.$productItem->category->categoryId.'/'.$productItem->productId) }}" class="btn btn1"> View Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-md-12">
                    <h4>No Product Available for {{$category->category}}</h4>
                </div>
                        
                @endforelse
            </div>
        </div>
    </div>
    
</div>