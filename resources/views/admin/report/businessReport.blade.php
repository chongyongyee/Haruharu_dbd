<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Business Report</title>
    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #121645;
            color: #fff;
        }
    </style>
</head>
<body>

    <table>
        <thead>
        <tr>
            <th class="no-border text-start heading" colspan="4">
                Business Report
            </th>
        </tr>
        <tr class="bg-blue">
            <th>Order ID</th>
            <th>Product Name</th>
            <th>Customer Name</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Payment Method</th>
            <th>Total Price</th>
        </tr>
        </thead>
        <tbody>
        @forelse($orders as $order)
                <?php
                $price = 0;
                $qty = 0;
                ?>
            <tr>
                <td class="cp color-blue">{{$order->id}}</td>
                <td>
                    <div class="">
                        @foreach($order->orderItems as $itemKey => $orderItem)
                                <?php
                                $price += $orderItem->price;
                                $qty += $orderItem->quantity;
                                ?>
                            <span>{{$orderItem->product->productName}}</span>
                            @if( !$loop->last),@endif
                        @endforeach
                    </div>
                </td>
                <td class="cp" >{{$order->fullname}}</td>
                <td class="cp">{{$qty}}</td>
                <td class="cp">{{$order->updated_at->format('d-m-Y')}}</td>
                <td class="cp" >{{$order->payment_mode}}</td>
                <td class="cp" >{{$price}}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">No Sales Records</td>
            </tr> 
        @endforelse
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="4">
                    Expenses Report
                </th>
            </tr>
            
            <tr class="bg-blue">
                <th>ID</th>
                <th>Expenses</th>
                <th>Cost</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($expenses as $row)
                <tr>
                    <td>{{ $row->expensesId}}</td>
                    <td>{{ $row->expensesName}}</td>
                    <td>RM {{ $row->cost, $precision = 8, $scale = 2}}</td>
                    <td>{{ $row->date}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No Expenses Records</td>
                </tr>
            @endforelse
        </tbody>
    </table>

