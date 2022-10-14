<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('userId', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5);
        return view('frontend.orders.index', compact('orders'));
    }
}
