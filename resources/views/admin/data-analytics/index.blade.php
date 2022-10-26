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
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses', 'Profit'],
          ['2014', 1000, 400, 200],
          ['2015', 1170, 460, 250],
          ['2016', 660, 1120, 300],
          ['2017', 1030, 540, 350]
        ]);

        var options = {
          chart: {
            title: 'Haruharu_dbd',
            subtitle: 'Sales, Expenses, and Profit',
          },
          bars: 'vertical' // Required for Material Bar Charts.
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

  <body>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div id="barchart_material" style="width: 900px; height: 500px;"></div>
  </body>
</html>


@endsection
