
<aside id="sideNavbar">
    <div class="sideNavbar-title">
      <div class="sideNavbar-brand">
        <p>Haruharu_dbd</p>
      </div>
      <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
    </div>

    <ul class="sideNavbar-list">
      <a href="{{ url('admin/dashboard') }}" class="nav">
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
        <a href="{{ url('admin/category') }}" class="nav">        
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">bar_chart</span> Category
          </li>
        </a>

        <a href="{{ url('admin/products') }}" class="nav">
          <li class="sideNavbar-list-item ">
            <span class="material-symbols-outlined">inventory</span> Products
          </li>
        </a>
      </div>


      <a href="{{ url('admin/sales') }}" class="nav">
        <li class="sideNavbar-list-item {{Request::is('admin/sales') ? 'active' :'' }}">
          <span class="material-icons-outlined">monetization_on</span> Sales
        </li>
      </a>

      <a href="{{ url('admin/orders') }}" class="nav">
        <li class="sideNavbar-list-item {{Request::is('admin/orders') ? 'active' :'' }}"> 
          <span class="material-icons-outlined">add_shopping_cart</span> Orders
        </li>
      </a>

      <a href="{{ url('admin/expenses') }}" class="nav">
        <li class="sideNavbar-list-item {{Request::is('admin/expenses') ? 'active' :'' }}"> 
          <span class="material-icons-outlined">local_atm</span> Expenses
        </li>
      </a>

      <a href="{{ url('admin/supplier') }}" class="nav">
        <li class="sideNavbar-list-item {{Request::is('admin/supplier') ? 'active' :'' }}">
          <span class="material-symbols-outlined">approval_delegation</span> Suppliers
        </li>
      </a>

      <a href="{{ url('admin/sliders') }}" class="nav">
        <li class="sideNavbar-list-item {{Request::is('admin/sliders') ? 'active' :'' }}">
          <span class="material-symbols-outlined">present_to_all</span> Home Slider
        </li>
      </a>

      <button class="btnDropDown">
          <li class="sideNavbar-list-item">
            <span class="material-icons-outlined">poll</span> Reports <i class="fa fa-caret-down"></i>
          </li>            
      </button>

      <div class="dropdown-content">
        <a href="{{ url('admin/businessReport') }}" class="nav">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">bar_chart</span> Business Report
          </li>
        </a>

        <a href="{{ url('admin/stockReport') }}" class="nav">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">inventory</span> Stock Report
          </li>
        </a>
      </div>
      

      <button class="btnDropDown">
          <li class="sideNavbar-list-item">
            <span class="material-icons-outlined">trending_up</span> Data Analytics <i class="fa fa-caret-down"></i>
          </li>            
      </button>

      <div class="dropdown-content">
        <a href="{{ url('/admin/dataAnalytics') }}" class="nav">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">pie_chart</span> Product Category Chart
          </li>
        </a>

        <a href="{{ url('admin/dataAnalytics/lineChart') }}" class="nav">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">show_chart</span> Orders Chart
          </li>
        </a>

        <a href="{{ url('admin/dataAnalytics/barChart') }}" class="nav">
          <li class="sideNavbar-list-item">
            <span class="material-symbols-outlined">bar_chart</span> Sales & Expenses Chart
          </li>
        </a>
      </div>

      <a href="{{ url('/admin/forecasting') }}" class="nav">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">travel_explore</span> Forecasting
        </li>
      </a>


      <a href="{{ url('/') }}" class="nav">
        <li class="sideNavbar-list-item">
          <span class="material-symbols-outlined">language</span> Website
        </li>
      </a>
      
    </ul>
</aside>