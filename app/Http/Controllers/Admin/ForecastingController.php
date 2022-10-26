<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ForecastingController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('admin.forecasting.index', compact('category'));
    }
}
