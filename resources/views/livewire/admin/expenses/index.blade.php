<div>
    <!-- Modal Delete-->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Expenses Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyExpenses">
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
                    <h3>Expenses
                        <a href="{{ url('admin/expenses/create') }}" class="btn btn-primary float-end">Add Expenses</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Expenses</th>
                                <th>Cost</th>
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        @forelse ($expenses as $row)
                            <tr>
                                <td>{{ $row->expensesId}}</td>
                                <td>{{ $row->expensesName}}</td>
                                <td>RM {{ $row->cost, $precision = 8, $scale = 2}}</td>
                                <td>{{ $row->date}}</td>
                                <td>
                                    <a href="{{ url('admin/expenses/'.$row->expensesId.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="#" wire:click="deleteExpenses({{ $row->expensesId }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger">Delete</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">No Expenses Records</td>
                            </tr>
                        @endforelse
                        </tbody>

                    </table>

            
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

        $(function () {
            var table = $('#data-table').DataTable({

            });
        });
    </script>
@endpush


