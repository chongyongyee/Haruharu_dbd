<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        return view('admin.data-analytics.index'); 
    }
     
}
