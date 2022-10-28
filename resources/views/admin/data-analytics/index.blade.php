@extends('layouts.admin')

@section('title','Data Analytics')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h4>
                    Data Analytics
                </h4>
            </div>
        </div>
    </div>
        
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category', 'Product'],
          <?php echo $chartData; ?>
        ]);

        var options = {
          title: 'Product Category Chart',
          is3D:true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          [2000, 100, 100],
          [2001, 200, 200],
          
          
        ]);

        var options = {
          title: 'Haruharu_dbd Sales & Expenses',
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>

  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div id="curve_chart" style="width: 900px; height: 500px"></div>
  </body>
</html>


@endsection
