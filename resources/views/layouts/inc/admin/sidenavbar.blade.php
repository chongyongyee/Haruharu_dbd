
<!-- Style -->
<link href="{{ asset('assets/css/sideBar.css') }}" rel="stylesheet">

<!-- Side Navigation bar -->
<aside id="sideNavbar">
    <div class="sideNavbar-title">
      <div class="sideNavbar-brand">
        <p>Haruharu_dbd</p>
      </div>
      <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
    </div>

    <ul class="sideNavbar-list">
      <a href="{{ url('admin/dashboard') }}">
        <li class="sideNavbar-list-item">            
            <span class="material-icons-outlined">dashboard</span> Dashboard            
        </li>
      </a>


      <button class="btnDropDown">
          <li class="sideNavbar-list-item">
            <span class="material-icons-outlined">inventory_2</span> Products <i class="fa fa-caret-down"></i>
          </li>            
      </button>
      <div class="dropdown-content">
        <a href="{{ url('admin/category') }}">        
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">bar_chart</span> Category
          </li>
        </a>

        <a href="{{ url('admin/products') }}">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">inventory</span> Products
          </li>
        </a>
      </div>


      <a href="{{ url('admin/sales') }}">
        <li class="sideNavbar-list-item">
          <span class="material-icons-outlined">monetization_on</span> Sales
        </li>
      </a>

      <a href="{{ url('admin/orders') }}">
        <li class="sideNavbar-list-item"> 
          <span class="material-icons-outlined">add_shopping_cart</span> Orders
        </li>
      </a>

      <a href="{{ url('admin/expenses') }}">
        <li class="sideNavbar-list-item"> 
          <span class="material-icons-outlined">local_atm</span> Expenses
        </li>
      </a>
      
      <a href="{{ url('admin/customer') }}">
        <li class="sideNavbar-list-item">
          <span class="material-icons-outlined">person</span> Customers
        </li>
      </a>

      <a href="{{ url('admin/supplier') }}">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">approval_delegation</span> Suppliers
        </li>
      </a>

      <a href="{{ url('admin/sliders') }}">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">present_to_all</span> Home Slider
        </li>
      </a>

      <button class="btnDropDown">
          <li class="sideNavbar-list-item">
            <span class="material-icons-outlined">poll</span> Reports <i class="fa fa-caret-down"></i>
          </li>            
      </button>
      <div class="dropdown-content">
        <a href="#">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">bar_chart</span> Business Report
          </li>
        </a>

        <a href="#">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">inventory</span> Stock Report
          </li>
        </a>
      </div>
      

      <a href="#">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">trending_up</span> Data Analytics
        </li>
      </a>

      <a href="#">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">travel_explore</span> Forecasting
        </li>
      </a>


      <a href="{{ url('/') }}">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">language</span> Website
        </li>
      </a>
      
    </ul>
  </aside>