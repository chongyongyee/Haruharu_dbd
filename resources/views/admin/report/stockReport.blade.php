<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Stock Report</title>

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
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
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
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
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
                    Stock Report 
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Product ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stock Left</th>
            </tr>
        </thead>
        <tbody>

            @foreach($product as $row)
                <tr>
                    <td width="10%">{{$row->productId}}</td>
                    <td width="10%">{{ $row->productName}}</td>
                    <td width="10%">RM {{$row->productSellingPrice}}</td>
                    <td width="10%">{{$row->productQuantity}}</td>
                </tr>
            @endforeach

                <tr>
                    <td colspan="3" class="total-heading">Total Stock Left:</td>
                    <td colspan="1" class="total-heading">{{ $row->sum('productQuantity') }}</td>
                </tr>

        </tbody>
    </table>
