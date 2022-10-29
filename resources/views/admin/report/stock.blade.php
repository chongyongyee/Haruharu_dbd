@extends ('layouts.admin')

@section('title', 'Stock Report')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>
                    Stock Report
                    <a href="{{ url('admin/stockReport/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Download Report</a>
                    <a href="{{ url('admin/stockReport/view') }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">View Report</a>
                </h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered table-striped" id="data-table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Stock Left</th>
                                </tr>

                            </thead>

                            <tbody>
                                @forelse ($product as $row)
                                    <tr>
                                        <td>{{ $row->productId}}</td>
                                        <td>{{ $row->productName}}</td>
                                        <td>RM {{ $row->productSellingPrice}}</td>
                                        <td>{{ $row->productQuantity}}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No Expenses Records</td>
                                    </tr>
                                @endforelse
                            </tbody>

                            <tr>
                                <td colspan="3" class="fw-bold">Total Stock Left:</td>
                                <td colspan="1" class="fw-bold">{{ $row->sum('productQuantity') }} </td>
                            </tr>
                        </table>

                        

                    </div>

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

