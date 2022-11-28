<?php

namespace App\Http\Livewire\Admin\Expenses;

use Livewire\Component;
use App\Models\Expenses;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $expensesId;

    public function deleteExpenses($expenses_id)
    {  
        //dd($expenses_id);
        $this->expensesId = $expenses_id;

    }

    public function destroyExpenses()
    {
        $expenses = Expenses::find($this->expensesId);

        $expenses->delete();
        session()->flash('message', 'Expenses Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function render()
    {
        $expenses = Expenses::orderBy('date','DESC')->get();
        return view('livewire.admin.expenses.index',['expenses'=>$expenses]);
    }
}
