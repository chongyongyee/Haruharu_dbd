<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/dashboard') }}">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-archive menu-icon"></i>
        <span class="menu-title">Products</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/category') }}">Category</a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/products') }}">Products</a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/sales') }}">
        <i class="mdi mdi-briefcase-check menu-icon"></i>
        <span class="menu-title">Sales</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/orders') }}">
        <i class="mdi  mdi-cart-outline menu-icon"></i>
        <span class="menu-title">Orders</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/expenses') }}">
        <i class="mdi mdi-coin menu-icon"></i>
        <span class="menu-title">Expenses</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/supplier') }}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Suppliers</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('admin/sliders') }}">
        <i class="mdi mdi-image-area menu-icon"></i>
        <span class="menu-title">Home Slider</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="mdi mdi-poll menu-icon"></i>
        <span class="menu-title">Reports</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"><a class="nav-link" href="{{ url('admin/businessReport') }}"> Business Report </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/stockReport') }}"> Stock Report </a></li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#report" aria-expanded="false" aria-controls="report">
        <i class="mdi mdi-chart-pie  menu-icon"></i>
        <span class="menu-title">Data Analytics</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="report">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/dataAnalytics') }}"> Product Category Chart </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/dataAnalytics/lineChart') }}"> Orders Chart </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('admin/dataAnalytics/barChart') }}"> Sales & Expenses Chart </a></li>
          <li class="nav-item"> <a class="nav-link" href="{{ url('/admin/dataAnalytics/analytics') }}" > Earnings Chart </a></li>
          
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/admin/forecasting') }}">
        <i class="mdi mdi-chart-line menu-icon"></i>
        <span class="menu-title">Forecasting</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ url('/') }}">
        <i class="mdi mdi-web menu-icon"></i>
        <span class="menu-title">Website</span>
      </a>
    </li>
  </ul>
</nav>