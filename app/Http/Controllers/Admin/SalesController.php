<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class SalesController extends Controller
{
    public function index()
    {   
       
        $sales= Order::where('status_message', 'completed')->get();
        return view('admin.sales.index', compact('sales'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        if($order)
        {
            return view('admin.sales.view', compact('order'));
        }
        else
        {
            return redirect('admin/sales')->with('message', 'Order Id not found');
        }
        

    }


}
