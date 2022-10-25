<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function businessIndex()
    {
        $expenses = Expenses::get();
        $sales = Order::get();
        return view('admin.report.business', compact('expenses','sales'));
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
