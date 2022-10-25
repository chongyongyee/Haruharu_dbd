<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExpensesFormRequest;
use App\Models\Expenses;

class ExpensesController extends Controller
{
    public function index()
    {
        return view('admin.expenses.index');
        
    }

    public function create()
    {
        return view('admin.expenses.create');
        //return ('add');
    }

    public function store(ExpensesFormRequest $request)
    {

        // check validation thru ExpensesFormRequest
        $validatedData = $request->validated();

        $expenses = new Expenses();
        $expenses->expensesName = $validatedData['expenses'];
        $expenses->cost = $validatedData['cost'];
        $expenses->date = $validatedData['date'];

        $expenses->save();

        return redirect('admin/expenses')->with('message', 'Expenses Added Successfully');
        
    }

    public function edit(Expenses $expenses)
    {
        return view('admin.expenses.edit', compact('expenses'));
        //return $expenses;
    }

    public function update(ExpensesFormRequest $request, $expenses)
    {
        //check validation thru ExpensesFormRequest
        $validatedData = $request->validated();

        $expenses = Expenses::findOrFail($expenses); 

        $expenses->expensesName =$validatedData['expenses'];
        $expenses->cost =$validatedData['cost'];
        $expenses->date =$validatedData['date'];

        $expenses->update();

        return redirect('admin/expenses')->with('message','Expenses Update Successfully');
    }

}
