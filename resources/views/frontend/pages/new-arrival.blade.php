@extends ('layouts.app')

@section('title','New Arrivals')

@section('content')

<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h4>New Arrivals Products</h4>
            <div class="underline mb-4"></div>
        </div>

            @forelse ($newArrivalProducts as $productItem)
                <div class="col-md-3">
                    <div class="product-card">
                        <div class="product-card-img">
                            <label class="stock bg-danger">New</label>
                                        
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
                <div class="col-md-12 p-2">
                    <h4>No Product Available</h4>
                </div>
            @endforelse 

            <div class="text-center">
                <a href="{{ url('collections') }}" class="btn btn-warning px-3">View More</a>
            </div>
        
                
            
        
        </div>
    </div>
</div>


@endsection