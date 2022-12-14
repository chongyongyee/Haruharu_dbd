@extends ('layouts.admin')

@section('title', 'Sales Details')

@section('content')

<div class="row">
    <div class="col-md-12">

    @if(session('message'))
        <div class="alert alert-success mb-3"> {{ session('message') }}</div>
    @endif

        <div class="card">
            <div class="card-header">
                <h3>Sales Details</h3>
            </div>

            <div class="card-body">
                
                    <h4 class="text-primary">
                        <i class="fa fa-shopping-cart text-dark"></i> My Sales Details
                        <a href="{{ url('admin/sales') }}" class="btn btn-danger btn-sm float-end mx-1 text-white">Back</a>
                        <a href="{{ url('admin/invoice/'. $order->id.'/generate') }}" class="btn btn-primary btn-sm float-end mx-1 text-white">Download Invoice</a>
                     <a href="{{ url('admin/invoice/' .$order->id) }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1 text-white">View Invoice</a>
                    </h4>
                    <hr>

                    <div class="row">
                        <div class="col-md-6">
                            <h5>Order Details</h5>
                            <hr>
                            <h6>Order Id: {{ $order->id }}</h6>
                            <h6>Tracking No: {{ $order->tracking_no }}</h6>
                            <h6>Ordered Date: {{ $order->created_at->format('d-m-Y h:i A') }}</h6>
                            <h6>Payment Method: {{ $order->payment_mode }}</h6>
                            <h6 class="border p-2 text-success">
                                Order Status Message: <span class="text-uppercase">{{ $order->status_message }}</span>
                            </h6>
                        </div>

                        <div class="col-md-6">
                            <h5>User Details</h5>
                            <hr>
                            <h6>Name: {{ $order->fullname }}</h6>
                            <h6>Email: {{ $order->email }}</h6>
                            <h6>Phone: {{ $order->phone }}</h6>
                            <h6>Postcode: {{ $order->postcode }}</h6>
                            <h6>Address: {{ $order->address }}</h6>
                                
                        </div>
                    </div>

                    <br/>
                    <h5>Order Items</h5>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th>Item ID</th>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $totalPrice = 0;
                                @endphp

                                @foreach($order->orderItems as $orderItem)
                                <tr>
                                    <td width="10%">{{$orderItem->id}}</td>
                                    <td width="10%">
                                        @if($orderItem->product->productImages)
                                            <img src="{{ asset($orderItem->product->productImages[0]->image) }}" style="width: 100px; height: 100px" alt="">
                                        @else
                                            <img src="" style="width: 100px; height: 100px" alt="">
                                        @endif
                                    </td>
                                    <td width="10%">{{ $orderItem->product->productName}}</td>
                                    <td width="10%">RM {{$orderItem->price}}</td>
                                    <td width="10%">{{$orderItem->quantity}}</td>
                                    <td width="10%" class="fw-bold">RM {{$orderItem->quantity * $orderItem->price}}</td>

                                    @php
                                        $totalPrice += $orderItem->quantity * $orderItem->price;
                                    @endphp

                                </tr>
                                @endforeach

                                <tr>
                                    <td colspan="5" class="fw-bold">Total Price:</td>
                                    <td colspan="1" class="fw-bold">RM {{$totalPrice}}</td>
                                </tr>

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

