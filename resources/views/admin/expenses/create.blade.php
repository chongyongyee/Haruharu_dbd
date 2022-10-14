@extends('layouts.admin')

@section('title','Add Expenses')

@section('content')

<div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Add Expenses
                        <a href="{{ url('admin/expenses') }}" class="btn btn-danger float-end">Back</a>
                    </h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('admin/expenses') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label>Expense</label>
                                <input type="text" name="expenses" class="form-control">     
                                @error('expenses')<small class="text-danger">{{ ($message) }} </small>@enderror                     
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
                        </div>
                    
                    </form>
                    
                </div>
            </div>

        </div>
    </div>

@endsection