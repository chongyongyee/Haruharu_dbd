@extends('layouts.admin')

@section('title','Edit Category')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Category
                    <a href="{{ url('admin/category') }}" class ="btn btn-primary float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/category/'.$category->categoryId) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" name="categoryname"  value="{{ $category->category}}" class="form-control"/>
                        @error('categoryname')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" value= "{{ $category->date}}" class="form-control"/>
                        @error('date')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="mb-3">                            
                        <button type="submit" class="btn btn-primary float-end">Update</button>
                    </div>

                </form>

            </div>
        </div>

    </div>
    
</div>


@endsection