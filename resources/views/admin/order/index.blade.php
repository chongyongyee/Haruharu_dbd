@extends('layouts.admin')

@section('title','Order')

@section('content')

<div>
    
    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Order</h3>
                </div>

                <div class="card-body">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-allOrders-tab" data-bs-toggle="tab" data-bs-target="#nav-allOrders" type="button" role="tab" aria-controls="nav-home" aria-selected="true">All Orders</button>
                        <button class="nav-link" id="nav-pending-tab" data-bs-toggle="tab" data-bs-target="#nav-pending" type="button" role="tab" aria-controls="nav-pending" aria-selected="false">Pending</button>
                        <button class="nav-link" id="nav-confirmed-tab" data-bs-toggle="tab" data-bs-target="#nav-confirmed" type="button" role="tab" aria-controls="nav-confirmed" aria-selected="false">Confirmed</button>
                        <button class="nav-link" id="nav-completed-tab" data-bs-toggle="tab" data-bs-target="#nav-completed" type="button" role="tab" aria-controls="nav-completed" aria-selected="false">Completed</button>
                    </div>
                </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-allOrders" role="tabpanel" aria-labelledby="nav-allOrders-tab" tabindex="0">
                        
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Order ID</th>
                                <th>Date</th>                            
                                <th>Price</th>
                                <th>Status</th>   
                                <th>Action</th>
                            </tr>
                            </thead>

                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                                </td>
                            
                            </tbody>
                        </table>
                        
                        </div>

                        <!-- Pending orders -->
                        <div class="tab-pane fade" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab" tabindex="0">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Order ID</th>
                                <th>Date</th>                            
                                <th>Price</th>
                                <th>Status</th>   
                                <th>Action</th>
                            </tr>
                            </thead>
                                
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                                </td>
                            </tbody>
                        </table>

                        </div>

                        <!-- Confirmed orders -->
                        <div class="tab-pane fade" id="nav-confirmed" role="tabpanel" aria-labelledby="nav-confirmed-tab" tabindex="0">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Order ID</th>
                                <th>Date</th>                            
                                <th>Price</th>
                                <th>Status</th>   
                                <th>Action</th>
                            </tr>
                            </thead>
                                
                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td> 
                                    <a href="#" class="btn btn-sm btn-success">Edit</a>
                                </td>
                            
                            </tbody>
                        </table>

                        </div>

                        <!-- Completed orders -->
                        <div class="tab-pane fade" id="nav-completed" role="tabpanel" aria-labelledby="nav-completed-tab" tabindex="0">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Customer Name</th>
                                <th>Order ID</th>
                                <th>Date</th>                            
                                <th>Price</th>  
                            </tr>
                            </thead>

                            <tbody>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                            </tbody>
                        </table>

                        </div>
                    </div>           

                </div>
            </div>

        </div>
    </div>
</div>
@endsection

