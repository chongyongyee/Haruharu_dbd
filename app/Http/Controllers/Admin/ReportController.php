<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;

class ReportController extends Controller
{
    public $OrderItem;

    public function __construct()
    {
        $this->OrderItem = new OrderItem; 
    }

    public function businessIndex()
    {
        $expenses = Expenses::orderBy('date','desc')->get();
        $Sales = $this->OrderItem->sales();
        return view('admin.report.business', compact('expenses','Sales'));

    }

    public function tableListing(Request $request)
    {

        if(!empty($request->from_date))
        {
            $expenses = Expenses::whereBetween('date', array($request->from_date, $request->to_date))->orderBy('date','desc')->get();

            $orders = Order::with([ 'orderItems', 'orderItems.product'])
                ->withCount('orderItems')
                ->withWhereHas('orderItems')
                ->Where('status_message', 'completed')
                ->whereBetween('updated_at', array($request->from_date, $request->to_date))
                ->orderBy('updated_at','desc')
                ->get();
        }
        else
        {
            $expenses = Expenses::orderBy('date','desc')->get();
            $orders = Order::with([ 'orderItems', 'orderItems.product'])
                ->withCount('orderItems')
                ->withWhereHas('orderItems')
                ->Where('status_message', 'completed')
                ->orderBy('updated_at','desc')
                ->get();
        }
        $Sales = $this->OrderItem->sales();
        $tableView = View::make('admin.report.table_business', compact('orders','Sales','expenses'))->render();

        return json_encode($tableView);

    }


    public function generateBusinessReport()
    {
        $expenses = Expenses::get();
        $product = Product::get();
        $orders = Order::with([ 'orderItems', 'orderItems.product'])
            ->withCount('orderItems')
            ->withWhereHas('orderItems', function($query){
                $query->whereHas('product', function ($query) {
                });
            })
            ->Where('status_message', 'completed')
            ->orderBy('updated_at','desc')
            ->get();
        $Sales = $this->OrderItem->sales();

        $pdf = Pdf::loadView('admin.report.businessReport', compact('expenses','product','orders','Sales'));

        $todayDate =Carbon::now()->format('d-m-Y');
        // download PDF file with download method
        return $pdf->download('businessReport-'.'-'.$todayDate.'.pdf');

    }


    public function stockIndex()
    {

        $product = Product::get();
        return view('admin.report.stock', compact('product'));
    }

    public function generateStockReport()
    {

        // retreive all records from db
        $product = Product::get();

        $pdf = Pdf::loadView('admin.report.stockReport', compact('product'));

        $todayDate =Carbon::now()->format('d-m-Y');
        // download PDF file with download method
        return $pdf->download('stockReport-'.'-'.$todayDate.'.pdf');
    }

    public function viewStockReport()
    {
        $product = Product::get();
        return view('admin.report.stockReport', compact('product'));
    }

}
