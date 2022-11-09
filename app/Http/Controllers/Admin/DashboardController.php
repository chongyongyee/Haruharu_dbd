<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Expenses;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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

    private function convertArray($array) {

        $result = [];
        foreach ($array as $value)
        {
            $result['total'][] = $value['total'];
            $result['products'][] = $value['productName'];
        }
        return $result;
    }
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrder = Order::count();
        $totalOrders = Order::count();
        $totalCategory = Category::count();
        $totalExpense = Expenses::count();
        $topFiveProducts =  Product::with('orderItems')
            ->leftJoin('order_items','products.productId','=','order_items.productId')
            ->selectRaw('products.productName,COALESCE(count(order_items.productId),0) total')
            ->groupBy('products.productId')
            ->orderBy('total','desc')
            ->take(5)
            ->get();
        $topProducts = $this->convertArray($topFiveProducts);
        $monthlySales = [];
        for ($month = 1; $month <= 12; $month++) {
            // Create a Carbon object from the current year and the current month
            $date = Carbon::create(date('Y'), $month);
            // Make a copy of the start date and move to the end of the month
            $date_end = $date->copy()->endOfMonth();
            $totalOrders = OrderItem::where('created_at', '>=', $date)
                ->where('created_at', '<=', $date_end)
                ->count();
            // Save the count of transactions for the current month in the output array
            $monthlySales[$month] = $totalOrders;
        }
        $saleProducts = $monthlySales;

        $sales = Order::where('status_message', 'completed')->get();
        $totalSales = $sales->count();

        $todayDate = Carbon::now();
        $thisMonth = Carbon::now()->format('m');
        $thisYear = Carbon::now()->format('Y');

        $todayOrder = Order::whereDate('created_at', $todayDate)->count();
        $thisMonthOrder = Order::whereMonth('created_at', $thisMonth)->count();
        $thisYearOrder = Order::whereYear('created_at', $thisYear)->count();

        return view('admin.dashboard', compact('totalProducts', 'totalOrder', 'totalOrders',
            'totalCategory', 'totalSales', 'totalExpense', 'todayOrder', 'thisMonthOrder','thisYearOrder',
            'topProducts','saleProducts'));
    }

}
