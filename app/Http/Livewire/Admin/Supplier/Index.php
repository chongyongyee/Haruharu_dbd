<?php

namespace App\Http\Livewire\Admin\Supplier;

use Livewire\Component;
use App\Models\Supplier;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $supplierId;

    public function deleteSupplier($supplier_id)
    {  
        //dd($supplier_id);
        $this->supplierId = $supplier_id;

    }

    public function destroySupplier()
    {
        $supplier = Supplier::find($this->supplierId);

        $supplier->delete();
        session()->flash('message', 'Supplier Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function render()
    {
        $supplier = Supplier::orderBy('date','DESC')->paginate(5);
        return view('livewire.admin.supplier.index',['supplier'=>$supplier]);
    }
}
