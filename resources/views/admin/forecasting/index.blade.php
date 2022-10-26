@extends('layouts.admin')

@section('title','Forecasting')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>
                    Forecasting
                </h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <label>Product Category: </label>
                </div>
                
                <div class="col-md-9">
                    <select name="categoryId" class="form-control">
                        @foreach($category as $row)     
                            <option value="{{ $row->categoryId }}"> {{$row->category}} </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="col-md-3 mt-4">
                    <label>Duration: </label>
                </div>

                <div class="col-md-3 mt-3">
                    <input type="date" name="dateFrom" class="form-control"/>
                </div>

                <div class="col-md-1 mt-4">
                    <label>to </label>
                </div>
                
                <div class="col-md-3 mt-3">
                    <input type="date" name="dateTo" class="form-control"/>
                </div>

                <div class="col-md-3 mt-3">
                    <label>Sales: </label>
                </div>

                <div class="col-md-9 mt-3">
                    <label>100 </label>
                </div>

                <div class="col-md-3 mt-3">
                    <label>Targeted Sales: </label>
                    
                </div>
                <div class="col-md-9 mt-3">
                    <input type="number" name="targetedSales" class="form-control"/>
                </div>

                <div class="col-md-12">
                    <br/>
                    <button type="submit" class="btn btn-primary float-end">Forecast</button>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection