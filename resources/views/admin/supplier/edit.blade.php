@extends('layouts.admin')

@section('title','Edit Supplier')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Supplier
                    <a href="{{ url('admin/supplier') }}" class="btn btn-sm btn-danger float-end text-white">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/supplier/'.$supplier->supplierId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ $supplier->supplierName }}" class="form-control">     
                        @error('name')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Product</label>
                        <input type="text" name="product" value="{{ $supplier->supplierProduct }}" class="form-control">     
                        @error('product')<small class="text-danger">{{ ($message) }} </small>@enderror                     
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{ $supplier->phone }}" class="form-control">     
                        @error('phone')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Cost</label>
                        <input type="text" name="cost" value="{{ $supplier->cost }}" class="form-control"> 
                        @error('cost')<small class="text-danger">{{ ($message) }} </small>@enderror                         
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" value="{{ $supplier->date }}" class="form-control">     
                        @error('date')<small class="text-danger">{{ ($message) }} </small>@enderror                     
                    </div>
                    
                    <div class="mb-3">
                        <button type="submit" class="btn btn-sm btn-primary float-end text-white">Update</button>                       
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</div>

@endsection