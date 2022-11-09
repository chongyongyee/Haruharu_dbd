<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('userId', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.orders.index', compact('orders'));
    }

    public function showOrder($orderId)
    {
        $order = Order::where('userId', Auth::user()->id)->where('id',$orderId)->first();
        if($order)
        {
            return view('frontend.orders.view', compact('order'));
        }
        else
        {
            return redirect()->back()->with('message', 'No Order Found');
        }
        
    }

    public function generateInvoice(int $orderId)
    {
        $order = Order::findOrFail($orderId);
        $data = ['order' => $order];

        $pdf = Pdf::loadView('admin.invoice.generate-invoice', $data);

        $todayDate =Carbon::now()->format('d-m-Y');
        return $pdf->download('invoice-'.$order->id.'-'.$todayDate.'.pdf');
    }
}
