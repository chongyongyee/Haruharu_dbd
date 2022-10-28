@extends('layouts.admin')

@section('title','Product')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if (session('message'))
        <div class="alert alert-success">{{session('message') }}</div>
    @endif
    
        <div class="card">
            <div class="card-header">
                <h3>Products
                    <a href="{{ url('admin/products/create') }}" class="btn btn-primary float-end">Add Products</a>
                </h3>
            </div>

            <div class="card-body">
                <table class="table table-bordered table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Category</th>                            
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>{{$product->productId}}</td>
                            <td>{{$product->productName}}</td>
                            
                            <td>
                                @if($product->category)
                                    {{$product->category->category}}
                                @else
                                    No Category
                                @endif
                            </td>

                            <td>RM {{$product->productSellingPrice}}</td>
                            <td>{{$product->productQuantity}}</td>
                           
                            <td>
                                <a href="{{ url('admin/products/'.$product->productId.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                <a href="{{ url('admin/products/'.$product->productId.'/delete') }}" onclick="return confirm('Are You Sure You Want To Delete This Data?')" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9">No Products Available</td>
                        </tr>

                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>


@endsection

@push('script')
<script>
    $(function () {
        var table = $('#data-table').DataTable({

        });
    });
</script>
@endpush