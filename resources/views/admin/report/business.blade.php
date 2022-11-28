@extends ('layouts.admin')

@section('title', 'Business Report')

@section('content')
<style>
    .buttons-html5
    {
        margin-right: 0.25rem!important;
        margin-left: 0.25rem!important;
        color: #fff;
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
</style>
<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                Business Report
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                            <label>Date From: </label>
                            <input type="date" name="dateFrom" class="form-control filterFrom"/>
                        </div>
                    <div class="col-md-3">
                        <label>Date To: </label>
                        <input type="date" name="dateTo" class="form-control filterTo"/>
                    </div>

                    <div class="col-md-6">
                        <br/>
                        <button type="submit" class="btn btn-sm btn-primary filterDate text-white">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-sm btn-success text-white">Refresh</button>
                    </div>
                    <br/>

                    <div class="table-responsive mt-3">
                        <div id="table"></div>

                    </div>

                </div>
            </div>
        </div>
</div>
@endsection

@push('script')
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>

    <script>
    $(document).ready(function () {
        manipulateTable()
    });
    $('#refresh').click(function(){
        $('.filterFrom').val('');
        $('.filterTo').val('');
        $('.businessTable,#Expensestable').DataTable().destroy();
        manipulateTable();
    });
    $('.filterDate').on('click', function ()
    {
        var filterFrom = $('.filterFrom').val();
        var filterTo = $('.filterTo').val();
        if(filterTo == '')
        {
            alert("Please Select Date To field.")
        }
        else if(filterFrom == '')
        {
            alert("Please Select Date From field.")
        }
        else
        {
            manipulateTable(filterFrom,filterTo);
        }
    })
    function manipulateTable(from_date = '', to_date = '')
    {
        $.ajax({
            method: "Get",
            url		: base_url+ '/admin/businessReport/listing',
            data: {from_date:from_date, to_date:to_date}

        }).done(function (response) {
            if (response)
            {
                $('#table').html(JSON.parse(response))
                var businessTable = $('.businessTable,#Expensestable').DataTable({
                    "ordering": false,
                    dom: 'Bfrtip',
                    buttons: [
                        {
                            extend: 'pdfHtml5',
                            download: 'open'
                        }
                    ]
                });
                businessTable.draw();
            }


        })
    }
</script>
@endpush
