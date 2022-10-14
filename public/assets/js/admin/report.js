/*if btn search is clicked, show report table */
const reportTable = document.getElementById("report_table");
const btnSearch = document.getElementById("btnSearch");
const btnToday = document.getElementById("btnToday");
const btnYest = document.getElementById("btnYest");
const btnCurrentMonth = document.getElementById("btnCurrentMonth");
const btnCurrentYear = document.getElementById("btnCurrentYear");


btnSearch.onclick = function() {
  if (reportTable.style.display !== "none") {
    reportTable.style.display = "none";
  } else {
    reportTable.style.display = "block";
  }
};

btnToday.onclick = function () {
  if (reportTable.style.display !== "none") {
    reportTable.style.display = "none";
  } else {
    reportTable.style.display = "block";
  }
};

btnYest.onclick = function () {
  if (reportTable.style.display !== "none") {
    reportTable.style.display = "none";
  } else {
    reportTable.style.display = "block";
  }
};

btnCurrentMonth.onclick = function () {
  if (reportTable.style.display !== "none") {
    reportTable.style.display = "none";
  } else {
    reportTable.style.display = "block";
  }
};

btnCurrentYear.onclick = function () {
  if (reportTable.style.display !== "none") {
    reportTable.style.display = "none";
  } else {
    reportTable.style.display = "block";
  }
};

$(document).ready(function(){
  $('#pdfIcon').click(function(){
    $('#report_table').printThis();
  });
});