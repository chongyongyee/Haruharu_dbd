<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

class OrderController extends Controller
{
     

    public function index(Request $request)
    {
        // $todayDate = Carbon::now();
        // $orders = Order::whereDate('created_at',$todayDate)->paginate(10);

        $todayDate = Carbon::now()->format('Y-m-d');
        $orders = Order::when($request->date != null, function($query) use ($request){

                        return $query->whereDate('created_at', $request->date);
                    }, function($query) use ($todayDate){

                        return $query->whereDate('created_at',$todayDate);
                    })

                    //status
                    ->when($request->status != null, function($query) use ($request){

                        return $query->where('status_message', $request->status);
                    })                    
                    ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(int $orderId)
    {
        $order = Order::where('id',$orderId)->first();
        if($order)
        {
            return view('admin.orders.view', compact('order'));
        }
        else
        {
            return redirect('admin/orders')->with('message', 'Order Id not found');
        }
        

    }

    
}
