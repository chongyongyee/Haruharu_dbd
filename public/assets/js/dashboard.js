var sideNavbarOpen = false;
var sideNavbar = document.getElementById("sideNavbar");

function openSidebar() {
  if(!sideNavbarOpen) {
    sideNavbar.classList.add("sideNavbar-responsive");
    sideNavbarOpen = true;
  }
}

function closeSidebar() {
  if(sideNavbarOpen) {
    sideNavbar.classList.remove("sideNavbar-responsive");
    sideNavbarOpen = false;
  }
}

// ---------- CHARTS ----------

// BAR CHART
var barChartOptions = {
  series: [{
    data: barChart ? Object.values(barChart['total']) : [],
  }],
  chart: {
    type: 'bar',
    height: 350,
    toolbar: {
      show: false
    },
  },
  colors: [
    "#246dec",
    "#cc3c43",
    "#367952",
    "#f5b74f",
    "#4f35a1"
  ],
  plotOptions: {
    bar: {
      distributed: true,
      borderRadius: 4,
      horizontal: false,
      columnWidth: '40%',
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  },
  xaxis: {
    categories: barChart ? Object.values(barChart['products']) : [],
  },
  yaxis: {
    title: {
      text: "Sales"
    }
  }
};

var barChart = new ApexCharts(document.querySelector("#bar-chart"), barChartOptions);
barChart.render();


// AREA CHART
var areaChartOptions = {
  series: [{
    name: 'Sales Orders',
    data: areaChart ? Object.values(areaChart) : [],
  }],
  chart: {
    height: 350,
    type: 'area',
    toolbar: {
      show: false,
    },
  },
  colors: ["#4f35a1", "#246dec"],
  dataLabels: {
    enabled: false,
  },
  stroke: {
    curve: 'smooth'
  },
  labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
  markers: {
    size: 0
  },
  yaxis: [
    {
      opposite: true,
      title: {
        text: 'Sales Orders',
      },
    },
  ],
  tooltip: {
    shared: true,
    intersect: false,
  }
};
var areaChart = new ApexCharts(document.querySelector("#area-chart"), areaChartOptions);
areaChart.render();

