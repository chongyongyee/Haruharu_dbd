<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SupplierFormRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        return view('admin.supplier.index');
    }

    public function create()
    {
        return view('admin.supplier.create');
    }

    public function store(SupplierFormRequest $request)
    {
        // check validation thru SupplierFormRequest
        $validatedData = $request->validated();

        $suppliers = new Supplier;
        $suppliers->supplierName =$validatedData['name'];
        $suppliers->supplierProduct =$validatedData['product'];
        $suppliers->cost =$validatedData['cost'];
        $suppliers->date =$validatedData['date'];

        $suppliers->save();

        return redirect('admin/supplier')->with('message','Supplier Added Successfully');

    }

    public function edit(Supplier $supplier)
    {
        return view('admin.supplier.edit', compact('supplier'));
    }

    public function update(SupplierFormRequest $request, $supplier)
    {
        //check validation thru SupplierFormRequest
        $validatedData = $request->validated();

        $suppliers = Supplier::findOrFail($supplier); 

        $suppliers->supplierName =$validatedData['name'];
        $suppliers->supplierProduct =$validatedData['product'];
        $suppliers->cost =$validatedData['cost'];
        $suppliers->date =$validatedData['date'];

        $suppliers->update();

        return redirect('admin/supplier')->with('message','Supplier Update Successfully');
    }
}
