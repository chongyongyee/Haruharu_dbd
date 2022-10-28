@extends('layouts.admin')

@section('title','Add Supplier')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Add Supplier
                    <a href="{{ url('admin/supplier') }}" class="btn btn-danger float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/supplier') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">     
                        @error('name')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Product</label>
                        <input type="text" name="product" class="form-control">     
                        @error('product')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control">     
                        @error('phone')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Cost</label>
                        <input type="text" name="cost" class="form-control"> 
                        @error('cost')<small class="text-danger">{{ ($message) }} </small>@enderror                         
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control">     
                        @error('date')<small class="text-danger">{{ ($message) }} </small>@enderror                     
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary float-end">Save</button>                       
                    </div>
                    
                </form>
            </div>
        </div>

    </div>
</div>

@endsection