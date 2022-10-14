<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        return view('admin.order.index');
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
