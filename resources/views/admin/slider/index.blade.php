@extends('layouts.admin')

@section('title','Slider')

@section('content')

<div>
   
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Slider List
                        <a href="{{ url('admin/sliders/create') }}" class="btn btn-sm btn-primary float-end text-white">Add Slider</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sliders as $slider)
                            <tr>
                                <td>{{ $slider->id }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->description }}</td>
                                <td>
                                    <img src="{{ asset("$slider->image") }}" style="width:90px; height:90px" alt="Slider">

                                </td>
                                <td>{{ $slider->status =='0' ? 'Visible':'Hidden'}}</td>
                                <td>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>
                                    <a href="{{ url('admin/sliders/'.$slider->id.'/delete') }}" 
                                        onclick="return confirm ('Are You Sure You Want To Delete This Slider?');"    
                                        class="btn btn-sm btn-danger text-white">Delete</a>
                                </td>
                            </tr>
                            
                            @endforeach
                       
                        </tbody>

                    </table>
                
                </div>
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