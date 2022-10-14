<?php

namespace App\Http\Livewire\Admin\Customer;

use Livewire\Component;
use App\Models\Customer;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $customerId;

    public function deleteCustomer($customer_id)
    {  
        //dd($customer_id);
        $this->customerId = $customer_id;

    }

    public function destroyCustomer()
    {
        $customer = Customer::find($this->customerId);

        $customer->delete();
        session()->flash('message', 'Customer Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }
     
    public function render()
    {
        $customer = Customer::orderBy('customerId','ASC')->paginate(5);
        return view('livewire.admin.customer.index',['customer'=>$customer]);
    }
}
