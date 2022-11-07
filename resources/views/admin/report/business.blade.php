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
                    <a href="{{ url('admin/businessReport/generate') }}" class="btn btn-primary btn-sm float-end mx-1">Download Report</a>
                <a href="{{ url('admin/businessReport/view') }}" target="_blank" class="btn btn-warning btn-sm float-end mx-1">View Report</a>
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
                        <button type="submit" class="btn btn-primary filterDate">Filter</button>
                        <button type="button" name="refresh" id="refresh" class="btn btn-success">Refresh</button>
                    </div>
                    <br/>

                    <div class="table-responsive mt-3">
                        <div id="table"></div>
                    </div>
                        <tr>
                            <td colspan="3" class="fw-bold">Total Earnings:</td>
                            <td colspan="1" class="fw-bold">RM {{ $Sales.'.00'}}</td>
                        </tr>
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
