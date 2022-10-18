@extends ('layouts.app')

@section('title','Home Page')

@section('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="false">
 
    <div class="carousel-inner">
        @foreach($sliders as $key => $sliderItem)
            <div class="carousel-item {{ $key == 0 ? 'active':''}}">
                @if ($sliderItem->image)
                    <img src="{{ asset("$sliderItem->image") }}" class="d-block w-100" alt="">
                @endif
              
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{ $sliderItem->title}}
                        </h1>
                        <p>
                            {{ $sliderItem->description}}
                        </p>
                        <div>
                            <a href="{{ url('/collections') }}" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
  
    </div>
  
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="py-5 bg-white">
    <div class="container">
        <div class="row content-justify-center">
            <div class="col-md-12 text-center">
                <h4>Welcome to Haruharu_dbd</h4>
                <div class="underline mx-auto">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- trending product -->
<div class="py-5">
    <div class="container">
        <div class="row">
        <div class="col-md-12">
            <h4>Trending Products</h4>
            <div class="underline mb-4"></div>
        </div>
        @if($trendingProducts)
            <div class="col-md-12">
                <div class="owl-carousel owl-theme trending-product">
                    @foreach ($trendingProducts as $productItem)
                        <div class="item">
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
                
                    @endforeach
                </div>
        @else
                <div class="col-md-12">
                    <h4>No Product Available</h4>
                </div>
            </div>
        @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
    $('.trending-product').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })

</script>

@endsection