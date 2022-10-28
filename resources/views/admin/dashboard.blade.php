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

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-3">
                <p class="text-dashboard">ORDERS</p>
              </div>
              <div class="col-md-4 mt-2">
              <p class="material-icons-outlined text-green float-end">add_shopping_cart</p>
              </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$totalOrders}}</span>
        </div>
       

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-8">
                <p class="text-dashboard">TODAY ORDERS</p>
              </div>
              <div class="col-md-2">
                <span class="material-icons-outlined text-red">shopping_cart</span>
              </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$todayOrder}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
                <div class="col-md-8">
                  <p class="text-dashboard">THIS MONTH ORDERS</p>
                </div>
                <div class="col-md-2 mt-2">
                  <span class="material-icons-outlined text-blue">local_mall</span>
                </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$thisMonthOrder}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-8">
                <p class="text-dashboard">THIS YEAR ORDERS</p>
              </div>
              <div class="col-md-2 mt-2">
                <span class="material-icons-outlined text-orange">shopping_bag</span>
              </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{ $thisYearOrder}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
                <div class="col-md-8">
                  <p class="text-dashboard">PRODUCTS</p>
                </div>
                <div class="col-md-2">
                  <span class="material-icons-outlined text-blue">inventory_2</span>
                </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$totalProducts}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-8">
                <p class="text-dashboard">CATEGORIES</p>
              </div>
              <div class="col-md-2">
                <span class="material-icons-outlined">category</span>
              </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$totalCategory}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-8">
                <p class="text-dashboard">SALES</p>
              </div>
              <div class="col-md-2">
                <span class="material-icons-outlined text-orange">monetization_on</span>
              </div>
            </div>
          </div>
          <span class="text-primary font-weight-bold">{{$totalSales}}</span>
        </div>

        <div class="cardDashboard">
          <div class="card-inner">
            <div class="row">
              <div class="col-md-8">
                <p class="text-dashboard">EXPENSES</p>
              </div>
              <div class="col-md-2">
                <span class="material-icons-outlined text-red">local_atm</span>
              </div>
            </div>
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
          <p class="chart-title">Product Category Sales Order</p>
          <div id="area-chart"></div>
        </div>

      </div>
    </main>
    <!-- End Main -->

  @livewireScripts
</body>
</html>

@endsection



  