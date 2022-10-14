<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('admin.customer.index');
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
