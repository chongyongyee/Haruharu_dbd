@extends('layouts.admin')

@section('title','Data Analytics-Orders Chart')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>
                    Data Analytics - Orders Chart
                </h4>
            </div>
        </div>
    </div>

<div id="container"></div>

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