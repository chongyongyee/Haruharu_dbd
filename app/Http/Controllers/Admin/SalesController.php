<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Carbon;

class SalesController extends Controller
{
    public function index(Request $request)
    {   
        
        $orders = Order::when($request->status = 'Completed', function($query) use ($request){

                        return $query->where('status_message', 'Completed');
                    })                    
                    ->paginate(10);


        return view('admin.sales.index', compact('orders'));
    }

    public function create(){
        //
    }

    public function store(){
        //
    }

    public function edit(){
        //
    }

    public function update(){
        //
    }
}
