<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoryId;

    public function deleteCategory($category_id)
    {  
        //dd($category_id);
        $this->categoryId = $category_id;

    }

    public function destroyCategory()
    {
        $category = Category::find($this->categoryId);

        $category->delete();
        session()->flash('message', 'Category Deleted');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        $category = Category::orderBy('categoryId','ASC')->get();
        return view('livewire.admin.category.index',['category'=> $category]);
    }
}
