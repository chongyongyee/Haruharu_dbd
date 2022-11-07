<div>

    <!-- Modal Delete -->
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Category Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form wire:submit.prevent="destroyCategory">
                    <div class="modal-body">
                        <h6>Are you sure you want to delete?</h6>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-sm text-white">Delete</button>
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
                    <h3>Category
                        <a href="{{ url('admin/category/create') }}" class ="btn btn-sm btn-primary float-end text-white">Add Category</a>
                    </h3>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped" id="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category Name</th>
                                <th>Date Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($category as $row)
                                <tr>
                                    <td>{{ $row->categoryId}}</td>
                                    <td>{{ $row->category}}</td>
                                    <td>{{ $row->date}}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$row->categoryId.'/edit') }}" class="btn btn-sm btn-success text-white">Edit</a>
                                        <a href="#" wire:click="deleteCategory({{ $row->categoryId }})" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn btn-sm btn-danger text-white">Delete</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">No Category Records</td>
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
