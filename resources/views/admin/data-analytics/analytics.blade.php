@extends('layouts.admin')

@section('title','Data Analytics')

@section('content')
    
    
        <div class="card">
            <div class="card-header">
                <h3>
                    Sales Expenses Profit Analytics
                </h3>
                
                <body>
                    <div id="newchart" style="height: 500px;margin-top: 50px;"></div>
                </body>
            </div>
        </div>


    @push('script')
    <script type="text/javascript">
       var Analytics = <?php echo $salesProfit ? $salesProfit : []; ?>;

       var options = {
           series: [{
               name: 'Sales Profit',
               data: Analytics ? Object.values(Analytics['profits']) : [],
           }, {
               name: 'Sales Expenses',
               data: Analytics ? Object.values(Analytics['expenses']) : [],
           }],
           chart: {
               type: 'bar',
               height: 350
           },
           plotOptions: {
               bar: {
                   horizontal: false,
                   columnWidth: '15%',
                   endingShape: 'rounded'
               },
           },
           dataLabels: {
               enabled: false
           },
           stroke: {
               show: true,
               width: 2,
               colors: ['transparent']
           },
           xaxis: {
               categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
           },
           yaxis: {
               title: {
                   // text: '$ (thousands)'
               }
           },
           fill: {
               opacity: 1
           },
           // tooltip: {
           //     y: {
           //         formatter: function (val) {
           //             return "$ " + val + " thousands"
           //         }
           //     }
           // }
       };

       var chart = new ApexCharts(document.querySelector("#newchart"), options);
       chart.render();
    </script>
    @endpush
@endsection
