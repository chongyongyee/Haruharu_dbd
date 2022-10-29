<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use Illuminate\Support\Carbon;

class DataAnalyticsController extends Controller
{
    public function pieChart()
    {

        $result = DB::select(DB::raw("SELECT COUNT(productName) as product_name,category.category from products LEFT JOIN category ON category.categoryId = products.categoryId GROUP BY category.categoryId"));
        $data = "";
        foreach($result as $val){
            $data.="['".$val->category."',     ".$val->product_name."],";
        }

        $chartData = $data;

        
        return view('admin.data-analytics.index',compact('chartData'));  
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
        return view('admin.data-analytics.barChart');
    }
  
     
}
