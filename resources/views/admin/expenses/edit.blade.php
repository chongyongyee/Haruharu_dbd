@extends('layouts.admin')

@section('title','Edit Expenses')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Edit Expenses
                    <a href="{{ url('admin/expenses') }}" class="btn btn-primary float-end">Back</a>
                </h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/expenses/'.$expenses->expensesId) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Expenses</label>
                        <input type="text" name="expenses" value="{{ $expenses->expensesName }}" class="form-control">     
                        @error('expenses')<small class="text-danger">{{ ($message) }} </small>@enderror                  
                    </div>
                    <div class="mb-3">
                        <label>Cost</label>
                        <input type="text" name="cost" value="{{ $expenses->cost }}" class="form-control"> 
                        @error('cost')<small class="text-danger">{{ ($message) }} </small>@enderror                         
                    </div>
                    <div class="mb-3">
                        <label>Date</label>
                        <input type="date" name="date" value="{{ $expenses->date }}" class="form-control">     
                        @error('date')<small class="text-danger">{{ ($message) }} </small>@enderror                     
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