@extends ('layouts.admin')

@section('title', 'Business Report')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>Report</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                            <label>Date From: </label>
                            <input type="date" name="dateFrom" class="form-control"/>
                        </div>
                    <div class="col-md-3">
                        <label>Date To: </label>
                        <input type="date" name="dateTo" class="form-control"/>
                    </div>
                    </br>
            
                    

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped data-table">
                            <thead>
                                <h5>Sales Report</h5>
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Date</th>
                                    <th>Payment Method</th>
                                    <th>Total Price</th>
                                </tr>

                            </thead>

                            <tbody>
                                <tr>
                                    <td>#</td>
                                    <td>Product</td>
                                    <td>Name</td>
                                    <td>Quantity</td>
                                    <td>Date</td>
                                    <td>Payment Method</td>
                                    <td>Total Price</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped mt-3 data-table">
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
                                        <td colspan="4">No Expenses Records</td>
                                    </tr>
                                @endforelse
                                
                            </tbody>
        
                        </table>

                        <tr>
                            <td colspan="3" class="fw-bold">Total Earnings:</td>
                            <td colspan="1" class="fw-bold">RM </td>
                        </tr>
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
        var table = $('.data-table').DataTable({

        });
    });
</script>
@endpush