<table class="table table-bordered table-striped businessTable">
    <h5>Sales Report</h5>
    <thead>
    <tr>
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
            $result_names = '';
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
            <td class="cp" >RM {{$price}}</td>
        </tr>
    @empty
        <tr>
            <td colspan="100%" class="text-center">No Sales Records</td>
        </tr>
    @endforelse
    </tbody>
</table>
<hr>
<table class="table table-bordered table-striped mt-3 data-table" id="Expensestable">
        <h5>Expenses Report</h5>
        <thead>
        <tr>
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
                <td colspan="100%" class="text-center">No Expenses Records</td>
            </tr>
        @endforelse

        </tbody>

</table>

