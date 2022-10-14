@extends('layouts.admin')

@section('title','Edit Product')

@section('content')

<div class="row">
    <div class="col-md-12">
        
        @if (session('message'))
            <h5 class="alert  alert-success mb-2">{{ session('message') }}</h5>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Products
                    <a href="{{ url('admin/products') }}" class="btn btn-danger float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-warning">
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    </div>
                @endif

                <form action="{{ url('admin/products/'.$product->productId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">Product Image</button>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Product Name</label>
                                <input type="text" name="name" value="{{ $product->productName }}" class="form-control"/>
                            </div>

                            <div class="mb-3">
                                <label>Product Category</label>
                                <select name="categoryId" class="form-control">
                                    @foreach($category as $row)     
                                        <option value="{{ $row->categoryId }}"{{$row->categoryId == $product->categoryId ? 'selected':'' }}> 
                                            {{$row->category}} 
                                        </option>
                                    @endforeach                          
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4">{{ $product->productDescription }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label>Quantity</label>
                                <input type="number" name="productQuantity" value="{{ $product->productQuantity }}" class="form-control"/>
                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                
                                <div class="mb-3">
                                    <label>Original Price</label>
                                    <input type="text" name="originalPrice" value="{{ $product->productOriginalPrice }}" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="sellingPrice" value="{{ $product->productSellingPrice }}" class="form-control"/>
                                </div>
                                
                                
                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <!-- image[] cos has multiple image -->
                                <input type="file" name="image[]" multiple class="form-control"/>
                            </div>
                            <div>
                                @if ($product->productImages)
                                <div class="row">
                                    @foreach ($product->productImages as $image)
                                    <div class="col-me-2">
                                        <img src ="{{ asset($image->image) }}"  style="width: 100px;height:100px;" class="me-4 border" alt="Img">
                                        <a href="{{ url('admin/product-image/'.$image->productImageId.'/delete') }}" class="d-block">Remove</a>
                                    </div>
                                    @endforeach
                                </div>
                                    
                                @else
                                    <h5>No Image Added</h5>
                                @endif
                            </div>
                            

                        </div>
                    </div>

                    <div>
                        </br>
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection

