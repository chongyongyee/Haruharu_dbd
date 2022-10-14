
<div>
    <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Customer Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyCustomer">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete?</h6>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">

            @if(session('message'))
                <div class="alert alert-success"> {{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Customer</h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Contact No</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse ($customer as $row)
                            <tr>
                                <td>{{ $row->customerId}}</td>
                                <td>{{ $row->customerName}}</td>
                                <td>{{ $row->phoneNo}}</td>
                                <td>{{ $row->email}}</td>
                                <td>{{ $row->address}}</td>
                                <td>
                                    <a href="#" data-toggle="modal" data-target="#viewModal" class="btn btn-sm btn-success">View</a>
                                    <a href="#" wire:click="deleteCustomer({{ $row->customerId }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Customer Records</td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>

                    <!--Pagination-->
                    <div>
                        {{ $customer->links()}}
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

@push('script')
    <script>
        window.addEventListener('close-modal', event => {

            $('#deleteModal').modal('hide');

        });

    </script>
@endpush
