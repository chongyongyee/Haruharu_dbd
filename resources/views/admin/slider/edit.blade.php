@extends('layouts.admin')

@section('title','Edit Slider')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Slider
                    <a href="{{ url('admin/sliders/') }}" class="btn btn-sm btn-danger float-end text-white">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/sliders/'.$slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Title</label>
                        <input type="text" name="title"  value="{{ $slider->title}}" class="form-control">     
                        @error('title')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>

                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name ="description" class="form-control" rows="3">{{ $slider->description}}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" name="image" class="form-control"> 
                        <img src="{{ asset($slider->image) }}" style="width: 70px; height:70px" alt="Slider"/>
                        @error('image')<small class="text-danger">{{ ($message) }} </small>@enderror                         
                    </div>
                    <div class="mb-3">
                        <label>Status</label>
                        <input type="checkbox" name="status" {{ $slider->status == '1' ? 'checked':'' }} style="width:25px; height:25px"/>
                        <br>
                        <h6>*Checked=Hidden, UnChecked=visible </h6>                       
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