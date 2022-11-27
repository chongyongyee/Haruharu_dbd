@extends ('layouts.app')

@section('title','Search  Products')

@section('content')

<div class="py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-md-10">
            <h4>Search Results</h4>
            <div class="underline mb-4"></div>
        </div>

            @forelse ($searchProducts as $productItem)
            <div class="col-md-10">
                <div class="product-card">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="product-card-img">
                                <label class="stock bg-danger">New</label>
                                            
                                @if($productItem->productImages->count()> 0)
                                    <a href="{{ url('/collections/'.$productItem->category->categoryId.'/'.$productItem->productId) }}">
                                        <!-- get the first image of the product -->
                                        <img src="{{ asset($productItem->productImages[0]->image) }}" alt="{{$productItem->productName}}">
                                    </a>
                                @endif

                            </div>
                        </div>

                        <div class="col-md-9">
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
                                <p style="height:45px; overflow:hidden">
                                    <b>Description : </b> {{$productItem->productDescription}}
                                </p>

                                <div class="mt-2">
                                    <a href="{{ url('/collections/'.$productItem->category->categoryId.'/'.$productItem->productId) }}" class="btn btn1"> View Details</a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
                
            @empty
                <div class="col-md-12 p-2">
                    <h4>No Match Record Found</h4>
                </div>
            @endforelse 

        <div class="col-md-10">
            {{$searchProducts->appends(request()->input())->links()}}
        </div>
        
        </div>
    </div>
</div>


@endsection