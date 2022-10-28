@extends ('layouts.admin')

@section('title', 'My Sales')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h3>Sales List</h3>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tracking No</th>
                                <th>Name</th>
                                <th>Payment Method</th>
                                <th>Ordered Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>   
                        </thead>

                        <tbody>
                            @forelse($sales as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->tracking_no}}</td>
                                    <td>{{$item->fullname}}</td>
                                    <td>{{$item->payment_mode}}</td>
                                    <td>{{$item->created_at->format('d-m-Y')}}</td>
                                    <td>{{$item->status_message}}</td>
                                    <td>
                                        <a href="{{ url('admin/sales/'.$item->id) }}" class="btn btn-primary btn-sm">View</a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="7">No Sales History</td>
                                </tr>
                            @endforelse

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
