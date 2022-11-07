@extends('layouts.admin')

@section('title','Data Analytics')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>
                Data Analytics - Orders Chart
            </h3>
                <body>
                    <div id="container"></div>
                </body> 
        </div>
    </div>




<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    var Data=<?php echo json_encode($Data)?>;
    Highcharts.chart('container',{

        title:{
            text:"A Chart For Orders"
        },

        xAxis:{
            categories:['Jan','Feb','March','April','May','June','July','Aug','Sept','Oct','Nov','Dec']

        },

        yAxis:{
            title:{
                text:"Number of Orders"
            }
        },

        series:[{
            name:"Orders",
            data:Data
        }],

    });

</script>

@endsection