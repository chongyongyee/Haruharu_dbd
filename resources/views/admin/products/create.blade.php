@extends('layouts.admin')

@section('title','Add Product')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Products
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

                <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

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
                                <input type="text" name="name" class="form-control"/>
                            </div>

                            <div class="mb-3">
                                <label>Product Category</label>
                                <select name="categoryId" class="form-control">
                                    @foreach($category as $row)     
                                        <option value="{{ $row->categoryId }}"> {{$row->category}} </option>
                                    @endforeach                          
                                </select>
                            </div>

                            <div class="mb-3">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="4"></textarea>
                            </div>

                            
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <div class="row">
                                
                                <div class="mb-3">
                                    <label>Quantity</label>
                                    <input type="number" name="productQuantity" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <label>Selling Price</label>
                                    <input type="text" name="sellingPrice" class="form-control"/>
                                </div>

                                <div class="mb-3">
                                    <label>Trending</label>
                                    <input type="checkbox" name="trending" style="width: 25px; height:25px;"/>
                                </div>

                            </div>
                            
                        </div>

                        <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label>Upload Product Images</label>
                                <!-- image[] cos has multiple image -->
                                <input type="file" name="image[]" multiple class="form-control"/>
                            </div>
                            

                        </div>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@endsection