@extends('layouts.admin')

@section('title','Add Category')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Add Category
                    <a href="{{ url('admin/category') }}" class ="btn btn-primary float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/category') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" name="categoryname" class="form-control"/>
                        @error('categoryname')<small class="text-danger">{{$message}}</small>@enderror
                    </div>

                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" class="form-control"/>
                        @error('date')<small class="text-danger">{{$message}}</small>@enderror
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