<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;

class DataAnalyticsController extends Controller
{
    public function index()
    {

        $orders = Order::all();
        return view('admin.data-analytics.index',['orders' => $orders]);  
    }
    //     $order = Order::select('id','created_at')->get()->groupBy(function($order){
    //         return Carbon::parse($order->created_at)->format('M');
    //     });

    //     $months = [];
    //     $monthCount=[];
    //     foreach($order as $month => $values){
    //         $months[]=$month;
    //         $monthCount[]=count($values);
    //     }
    //     return view('admin.data-analytics.index',['order' => $order, 'months'=> $months, 'monthCount'=>$monthCount]);
    // }
     
}
