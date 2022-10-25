<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use App\Models\Order;
use App\Models\Product;

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
}
