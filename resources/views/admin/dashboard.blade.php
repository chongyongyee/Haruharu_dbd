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
              <p class="text-dashboard">ORDERS</p>
            <span class="material-icons-outlined text-green">add_shopping_cart</span>
          </div>
          <span class="text-primary font-weight-bold">{{$totalOrders}}</span>
        </div>
       

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">TODAY ORDERS</p>
            <span class="material-icons-outlined text-red">shopping_cart</span>
          </div>
          <span class="text-primary font-weight-bold">{{ $todayOrder}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">THIS MONTH ORDERS</p>
            <span class="material-icons-outlined text-blue">local_mall</span>
          </div>
          <span class="text-primary font-weight-bold">{{ $thisMonthOrder}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">THIS YEAR ORDERS</p>
            <span class="material-icons-outlined text-orange">shopping_bag</span>
          </div>
          <span class="text-primary font-weight-bold">{{ $thisYearOrder}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">PRODUCTS</p>
            <span class="material-icons-outlined text-blue">inventory_2</span>
          </div>
          <span class="text-primary font-weight-bold">{{$totalProducts}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">CATEGORIES</p>
            <span class="material-icons-outlined">category</span>
          </div>
          <span class="text-primary font-weight-bold">{{$totalCategory}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">SALES</p>
            <span class="material-icons-outlined text-orange">monetization_on</span>
          </div>
          <span class="text-primary font-weight-bold">{{$totalSales}}</span>
        </div>

        <div class="card">
          <div class="card-inner">
            <p class="text-dashboard">EXPENSES</p>
            <span class="material-icons-outlined text-red">local_atm</span>
          </div>
          <span class="text-primary font-weight-bold">{{$totalExpense}}</span>
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



  