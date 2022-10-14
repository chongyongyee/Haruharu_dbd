@extends ('layouts.app')

@section('title','All Categories')

@section('content')

<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="mb-4">Our Categories</h4>
                </div>

                @forelse ($categories as $categoryItem)

                <div class="col-6 col-md-3">
                    <div class="category-card">
                        <a href="{{ url('/collections/'.$categoryItem->categoryId) }}">                          
                            <div class="category-card-body">
                                <h5>{{ $categoryItem->category}}</h5>
                            </div>
                        </a>
                    </div>
                </div>
                @empty
                <div class="col-md-12">
                    <h5>No Category Available</h5>
                </div>
                
                @endforelse
                
            </div>
        </div>
    </div>

@endsection