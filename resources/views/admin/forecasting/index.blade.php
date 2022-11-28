@extends('layouts.admin')

@section('title','Forecasting')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>
                    Forecasting
                </h4>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3 mt-2">
                    <label>Product Category: </label>
                </div>

                <div class="col-md-9">
                    <select name="categoryId" class="form-control filterCategory">
                        <option value=""> Select Category </option>
                        @foreach($category as $row)
                            <option value="{{ $row->categoryId }}"> {{$row->category}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mt-4">
                    <label>Duration: </label>
                </div>

                <div class="col-md-3 mt-3">
                    <input type="date" name="dateFrom" class="form-control filterFrom"/>
                </div>

                <div class="col-md-1 mt-4">
                    <label>to </label>
                </div>

                <div class="col-md-3 mt-3">
                    <input type="date" name="dateTo" class="form-control filterTo"/>
                </div>

                <div class="col-md-3 mt-3">
                    <label>Sales: </label>
                </div>

                <div class="col-md-9 mt-3">
                    <label id="noOfSales">0</label>
                </div>

                <div class="col-md-3 mt-3">
                    <label>Targeted Sales: </label>

                </div>
                <div class="col-md-9 mt-3">
                    <input type="number" name="targetedSales" class="form-control targetedSales"/>
                </div>

                <div class="col-md-12">
                    <br/>
                    <button type="submit" class="btn btn-sm btn-primary float-end forcastSales text-white">Forecast</button>
                </div>
            </div>
            <div class="col-md-6 text-center m-auto">
                <!-- <canvas id="chartContainer" height="500" width="800"></canvas> -->
                <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            </div>

        </div>

    </div>
</div>
@push('script')
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script type="text/javascript">
    </script>
    <script>
        $(document).ready(function () {
            
        });
        $('.filterCategory,.filterTo,.filterFrom').on('change', function ()
        {
            manipulateData();
        })
        function manipulateData()
        {
            var filterFrom = $('.filterFrom').val();
            var filterTo = $('.filterTo').val();
            const category = $(".filterCategory").val();
            $.ajax({
                method: "Get",
                url		: base_url+ '/admin/forecasting/filtering',
                data: {category,filterFrom,filterTo}

            }).done(function (response) {
                if (response)
                {
                    console.log(response);
                    $('#noOfSales').text(response);
                }


            })
        }
        $(document).on('click','.forcastSales',function ()
        {
            var filterFrom = $('.filterFrom').val();
            var filterTo = $('.filterTo').val();
            const category = $(".filterCategory").val();
            const targetedSales = $(".targetedSales").val();

            if(category == '')
            {
                alert('Please select Category!');
                return false;
            }
            if(targetedSales == '')
            {
                alert('Please enter Targeted Sales!');
                return false;
            }
            
            $.ajax({
                method: "Get",
                url		: base_url+ '/admin/forecasting/filtering',
                data: {category,filterFrom,filterTo}

            }).done(function (response) {
                if (response)
                {
                    console.log(response);
                    $('#noOfSales').text(response);
                    loadGraph(response,targetedSales);
                }


            })
        })
        function loadGraph(data=null,targetedSales=null)
        {
            var CurrentYear = new Date().getFullYear()
            var years = [2023,2024,2025,2026,2027,2028,2029,2030]
            var dataPointsnew = [{ x: new Date(parseInt(CurrentYear), 0), y: parseInt(data) }];

            $.each(years, function(index, value) {

                // var sales = (Math.random() * parseInt(data)) + (1-Math.random())*(targetedSales);
                var sales = (Math.random() * parseInt(data)) + (1-Math.random())*(targetedSales);
                dataPointsnew.push({ x: new Date(value, 0), y: sales });
            });

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title:{
                    text: "Forcasting Sales"
                },
                axisY: {
                    title: "Sales",
                    valueFormatString: "0",
                },
                axisX: {
                    title: "Year",
                },
                data: [{
                    yValueFormatString: "#,### Sales",
                    xValueFormatString: "YYYY",
                    type: "spline",
                    dataPoints: dataPointsnew
                }]
            });
            chart.render();
        }
    </script>
@endpush
@endsection
