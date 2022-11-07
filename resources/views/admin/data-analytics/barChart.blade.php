@extends('layouts.admin')

@section('title','Data Analytics')

@section('content')

  <div class="card">
    <div class="card-header">
        <h3>
          Data Analytics - Sales & Expenses Chart
        </h3>
        <body>
          
        <div class="charts">
          <div class="charts-card">
            <div id="barchart_material_month_sales" style="width: 400px; height: 300px;"></div>
          </div>
          <div class="charts-card">
            <div id="barchart_material_year_sales" style="width: 400px; height: 300px;"></div>
          </div>
          <div class="charts-card">
            <div id="barchart_material_month_expenses" style="width: 400px; height: 300px;"></div>
          </div>
          <div class="charts-card">
            <div id="barchart_material_year_expenses" style="width: 400px; height: 300px;"></div>
          </div>
          </div>
        </body>
    </div>
  </div>


    <br>
    <!-- Sales Month Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Sales'],
          <?php echo implode ($barDataMonthSales); ?>
          
        ]);

        var options = {
          chart: {
            title: 'Haruharu_dbd',
            subtitle: 'Total Sales per month',
          },
          bars: 'vertical' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_month_sales'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <!-- Sales Year Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales'],
          <?php echo implode ($barDataYearSales); ?>
          
        ]);

        var options = {
          chart: {
            title: 'Haruharu_dbd',
            subtitle: 'Total Sales per year',
          },
          bars: 'vertical' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_year_sales'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <!-- Expenses Month Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Expenses'],
          <?php echo implode ($barDataMonthExpenses); ?>
          
        ]);

        var options = {
          chart: {
            title: 'Haruharu_dbd',
            subtitle: 'Total Expenses per month',
          },
          bars: 'vertical' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_month_expenses'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

    <!-- Expenses Year Chart -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart1);

      function drawChart1() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Expenses'],
          <?php echo implode ($barDataYearExpenses); ?>
          
        ]);

        var options = {
          chart: {
            title: 'Haruharu_dbd',
            subtitle: 'Total Expenses per year',
          },
          bars: 'vertical' 
        };

        var chart = new google.charts.Bar(document.getElementById('barchart_material_year_expenses'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

  
@endsection