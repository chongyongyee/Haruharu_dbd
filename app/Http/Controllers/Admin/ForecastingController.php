<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ForecastingController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.forecasting.index', compact('category'));
    }

    private function convertArray($array) {

        $result = [];
        foreach ($array as $value)
        {
            $result['total'][] = $value['total'];
        }
        return json_encode($result);
    }
    public function filtering(Request $request)
    {
        $CategorySales = [];
        $range = [request('filterFrom'), request('filterTo')];
        if ($request->ajax()) {
            $filter = $request->all();
            $CategorySales = Product::whereHas('orderItems', function ($q) use ($filter, $range)
            {
                if (!empty ($filter['filterFrom']))
                {
                    $q->whereBetween('created_at', $range);
                }
            })
                ->when(request('category'), function ($query)
                {
                    $query->where('categoryId', request('category'));
                })->with(['orderItems'])->get();
        }
        $noOfSales = 0;
        foreach ($CategorySales as $sale) { 
            $noOfSales += $sale->orderItems->sum('quantity');
        }
        return json_encode($noOfSales);
    }
}
