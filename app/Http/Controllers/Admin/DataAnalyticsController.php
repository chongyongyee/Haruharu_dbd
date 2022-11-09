<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expenses;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Carbon;

class DataAnalyticsController extends Controller
{
    public $OrderItem;
    public $Expenses;

    public function __construct()
    {
        $this->OrderItem = new OrderItem;
        $this->Expenses = new Expenses;
    }

    public function analytics()
    {
        $data['profits'] = [];
        for ($month = 1; $month <= 12; $month++) {
            $date = Carbon::create(date('Y'), $month);
            $date_end = $date->copy()->endOfMonth();
            $totalOrders = OrderItem::where('created_at', '>=', $date)
                ->where('created_at', '<=', $date_end)
                ->sum('price');
            $Expenses = Expenses::where('date', '>=', $date)
                ->where('date', '<=', $date_end)
                ->sum('cost');
            // Save the count of transactions for the current month in the output array
            $data['profits'][$month] = $totalOrders;
            $data['expenses'][$month] = $Expenses;
        }
        $salesProfit = json_encode($data);
        return view('admin.data-analytics.analytics',compact('salesProfit'));

    }
    public function pieChart()
    {

        $result = DB::select(DB::raw("SELECT COUNT(productName) as product_name,category.category from products LEFT JOIN category ON category.categoryId = products.categoryId GROUP BY category.categoryId"));
        $data = "";
        foreach($result as $val){
            $data.="['".$val->category."',     ".$val->product_name."],";
        }

        $chartData = $data;


        return view('admin.data-analytics.pieChart',compact('chartData'));
    }

    public function lineChart()
    {
        $Data = Order::select(DB::raw("COUNT(*) as count"))
                ->whereYear('created_at' ,date('Y'))
                ->groupBy(DB::raw("Month(created_at)"))
                ->pluck('count');

        return view('admin.data-analytics.lineChart', compact('Data'));
    }

    public function barChart()
    {

        $totalMonthSales = DB::select(DB::raw("SELECT date_format(updated_at,'%M') as month, sum(price) as price from order_items GROUP BY month(updated_at) ORDER BY month(updated_at)"));
        $totalYearSales = DB::select(DB::raw("SELECT date_format(updated_at,'%Y') as year, sum(price) as price from order_items GROUP BY year(updated_at) ORDER BY year(updated_at)"));
        $totalMonthExpenses = DB::select(DB::raw("SELECT date_format(date,'%M') as month, sum(cost) as cost from expenses GROUP BY month(date) ORDER BY month(date)"));
        $totalYearExpenses = DB::select(DB::raw("SELECT date_format(date,'%Y') as year, sum(cost) as cost from expenses GROUP BY year(date) ORDER BY year(date)"));

        
        $dataMonthSales = [];
        $dataYearSales = [];
        $dataMonthExpenses = [];
        $dataYearExpenses = [];

        foreach($totalMonthSales as $val){
            $dataMonthSales[]="['".$val->month."',".$val->price."],";
        }

        foreach($totalYearSales as $val){
            $dataYearSales[]="['".$val->year."',".$val->price."],";
        }

        foreach($totalMonthExpenses as $val){
            $dataMonthExpenses[]="['".$val->month."',".$val->cost."],";
        }

        foreach($totalYearExpenses as $val){
            $dataYearExpenses[]="['".$val->year."',".$val->cost."],";
        }

        $barDataMonthSales = $dataMonthSales;
        $barDataYearSales = $dataYearSales;
        $barDataMonthExpenses = $dataMonthExpenses;
        $barDataYearExpenses = $dataYearExpenses;

        return view('admin.data-analytics.barChart',compact('barDataMonthSales','barDataYearSales','barDataMonthExpenses','barDataYearExpenses'));
    }


}
