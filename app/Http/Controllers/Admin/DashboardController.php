<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expenses;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalCategory = Category::count();
        $totalExpense = Expenses::count();

        $sales = Order::where('status_message', 'completed')->get();
        $totalSales = $sales->count();

        $todayDate = Carbon::now();
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrders','totalCategory', 'totalSales', 'totalExpense', 'todayOrder', 'thisMonthOrder','thisYearOrder'));
    }
}
