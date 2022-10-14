@extends('layouts.admin')

@section('title','Dashboard')

@section('content')
 
<body>
    <!-- Main -->    
    <main class="main-container">      
      <div class="main-title">
        <p class="font-weight-bold">DASHBOARD</p>
      </div>

      <div class="main-cards">

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">PRODUCTS</p>
            <span class="material-icons-outlined text-blue">inventory_2</span>
          </div>
          <span class="text-primary font-weight-bold">249</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">SALES</p>
            <span class="material-icons-outlined text-orange">monetization_on</span>
          </div>
          <span class="text-primary font-weight-bold">83</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">ORDERS</p>
            <span class="material-icons-outlined text-green">add_shopping_cart</span>
          </div>
          <span class="text-primary font-weight-bold">79</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-primary">EXPENSES</p>
            <span class="material-icons-outlined text-red">local_atm</span>
          </div>
          <span class="text-primary font-weight-bold">56</span>
        </div>

      </div>
      
      <!--Charts-->
      <div class="charts">

        <div class="charts-card">
          <p class="chart-title">Top 5 Products</p>
          <div id="bar-chart"></div>
        </div>

        <div class="charts-card">
          <p class="chart-title">Purchase and Sales Orders</p>
          <div id="area-chart"></div>
        </div>

      </div>
    </main>
    <!-- End Main -->

  @livewireScripts
</body>
</html>

@endsection



  